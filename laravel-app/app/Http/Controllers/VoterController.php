<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VoterController extends Controller
{
    public function showLogin()
    {
        return view('voter.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string'
        ]);

        $voter = Voter::where('id_number', $request->id_number)->first();

        if ($voter && !$voter->has_voted) {
            if ($request->filled('name') && $request->name === $voter->name) {
                session(['voter_id' => $voter->id_number]);
                return response()->json(['success' => true, 'message' => 'Authenticated']);
            }

            return response()->json(['message' => $request->filled('name') ? 'O nome não corresponde.' : 'requiresNameValidation']);
        }

        return response()->json(['message' => 'Número inválido ou já votou.'], 422);
    }

    public function validateVoter(Request $request)
    {
        $id_number = session('voter_id');
        $voter = Voter::where('id_number', $id_number)->first();

        if (!$voter || $request->name !== $voter->name) {
            return redirect()->route('voter.showLogin');
        }

        session(['voter_id' => $voter->id_number]);
        return redirect()->route('polls.index');
    }

    public function logout()
    {
        session()->forget('voter_id');
        return redirect()->route('home');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $filename = Str::random(10) . '.csv';
        $file = $request->file('csv_file');
        $file->storeAs('imports', $filename);

        $path = storage_path('app/imports/' . $filename);

        $data = array_map(function ($v) {
            return str_getcsv($v, ";");
        }, file($path));

        array_shift($data);

        try {
            foreach ($data as $row) {
                $idNumber = preg_replace('/[^0-9]/', '', $row[0]);

                if (empty($idNumber)) {
                    continue;
                }

                $idNumber = preg_replace('/[^0-9]/', '', $row[0]);

                $existingVoter = Voter::where('id_number', $idNumber)->first();

                if (!$existingVoter) {
                    $newVoter = [
                        'id_number' => $idNumber,
                        'name' => $row[2],
                        'region' => trim($row[1]),
                        'has_voted' => false,
                    ];

                    Voter::create($newVoter);
                }
            }
            File::delete($path);
            return redirect()->route('admin.manageVoters')->with('success', 'Votantes adicionados com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro durante a importação. Verifique o ficheiro e tente de novo. Mensagem de erro: ' . $e->getMessage());
        }
    }

    public function showCsvImportForm()
    {
        return view('voter.import');
    }
}
