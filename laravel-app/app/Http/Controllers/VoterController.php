<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string'
        ]);

        $voter = Voter::where('id_number', $request->id_number)->first();

        if ($voter && !$voter->has_voted) {
            if ($request->filled('name')) {
                if ($request->name === $voter->name) {
                    session(['voter_id' => $voter->id_number]); // Store the id_number in the session
                    return response()->json(['success' => true]);
                } else {
                    return response()->json(['message' => 'O nome não corresponde.'], 422);
                }
            }
            return response()->json(['requiresNameValidation' => true]);
        }

        return response()->json(['message' => 'Número inválido ou já votou.'], 422);
    }

    public function showLogin()
    {
        return view('voter.login');
    }

    public function validateVoter(Request $request)
    {
        $id_number = session('voter_id');
        $voter = Voter::where('id_number', $id_number)->first();

        if (!$voter) {
            return redirect()->route('voter.showLogin');
        }

        if ($request->name === $voter->name) {
            session(['voter_id' => $voter->id_number]); // Store the id_number in the session
            return redirect()->route('polls.index'); // Redirect to the poll list or a specific poll
        }

        return view('voter.validate', ['voter' => $voter]);
    }

    public function showLoginForm()
    {
        return view('voter.login');
    }

    public function logout()
    {
        session()->forget('voter_id'); // Remove the id_number from the session
        return redirect()->route('home'); // Redirect to the homepage or any other preferred route
    }

    public function debugSession(Request $request)
    {
        $data = $request->session()->all();

        return view('debug.session', ['data' => $data]);
    }

}
