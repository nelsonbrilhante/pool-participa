<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class VoterController extends Controller
{
    /**
     * Displays the login view for voters.
     */
    public function showLogin()
    {
        return view('voter.login');
    }

    /**
     * Handles the login logic for voters.
     */
    public function login(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string'
        ]);

        $voter = Voter::where('id_number', $request->id_number)->first();

        if ($voter && !$voter->has_voted) {
            if ($request->filled('name') && $request->name === $voter->name) {
                session(['voter_id' => $voter->id_number]);
                return response()->json(['success' => true]);
            }
            // Return 200 OK with the message
            return response()->json(['message' => $request->filled('name') ? 'O nome não corresponde.' : 'requiresNameValidation']);
        }

        return response()->json(['message' => 'Número inválido ou já votou.'], 422);
    }


    /**
     * Validates the name of the voter.
     */
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

    /**
     * Logs out the voter.
     */
    public function logout()
    {
        session()->forget('voter_id');
        return redirect()->route('home');
    }

    /**
     * Displays the debug information for the session.
     */
    public function debugSession(Request $request)
    {
        $data = $request->session()->all();
        return view('debug.session', ['data' => $data]);
    }

    /**
     * Imports voters from a CSV file.
     */
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

        array_shift($data); // Removes the CSV header row

        try {
            foreach ($data as $row) {
                $regionParts = explode('>', $row[1]);
                $region = trim(end($regionParts));

                $existingVoter = Voter::where('id_number', $row[0])->first();

                if (!$existingVoter) {
                    Voter::create([
                        'id_number' => $row[0],
                        'name' => $row[4],
                        'table' => $row[3],
                        'region' => $region,
                        'has_voted' => false,
                    ]);
                }
            }
            File::delete($path); // Delete the file after the import
            return redirect()->route('admin.manageVoters')->with('success', 'Votantes adicionados com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro durante a importação. Verifique o ficheiro e tente de novo. Mensagem de erro: ' . $e->getMessage());
        }
    }





    /**
     * Displays the form to import voters from a CSV file.
     */
    public function showCsvImportForm()
    {
        return view('voter.import');
    }
}
