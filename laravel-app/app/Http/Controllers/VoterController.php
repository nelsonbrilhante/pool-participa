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
        Log::info("Stored CSV file at: " . $path);

        $data = array_map(function ($v) {
            return str_getcsv($v, ";");
        }, file($path));

        array_shift($data); // Removes the CSV header row

        Log::info("CSV Data: ", $data); // Log the entire CSV data

        try {
            foreach ($data as $row) {
                // Extract the numeric portion of the id_number using regex
                $idNumber = preg_replace('/[^0-9]/', '', $row[0]);

                // If id_number is empty, skip this row
                if (empty($idNumber)) {
                    continue;
                }
                // Remove any starting letters for the Código value
                $idNumber = preg_replace('/[^0-9]/', '', $row[0]);

                Log::info("Parsed id_number: " . $idNumber);
                Log::info("Parsed region: " . trim($row[1])); // Log the parsed region

                $existingVoter = Voter::where('id_number', $idNumber)->first();

                if (!$existingVoter) {
                    $newVoter = [
                        'id_number' => $idNumber,
                        'name' => $row[2],
                        'region' => trim($row[1]),
                        'has_voted' => false,
                    ];

                    Voter::create($newVoter);
                    Log::info("New Voter Created: ", $newVoter); // Log the voter data being saved
                }
            }
            File::delete($path); // Delete the file after the import
            return redirect()->route('admin.manageVoters')->with('success', 'Votantes adicionados com sucesso.');
        } catch (\Exception $e) {
            Log::error("Error during import: " . $e->getMessage()); // Log any exceptions
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
