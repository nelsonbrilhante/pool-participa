<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class PollController extends Controller
{
    public function index()
    {
        $activePolls = Poll::where('status', 'active')->get();
        $voter = Voter::where('id_number', session('voter_id'))->first();
        return view('polls.index', ['polls' => $activePolls, 'voter' => $voter]);
    }


    public function show(Poll $poll)
    {
        return view('polls.show', ['poll' => $poll]);
    }

    public function vote(Request $request, Poll $poll)
    {
        $voter = Voter::where('id_number', session('voter_id'))->first();

        if (!$voter || $voter->has_voted) {
            return redirect()->route('polls.error')->with('error', 'Este eleitor já votou, ou não se encontra autorizado. Se pensa que isto é um erro, por favor entre em contacto com o Município da Nazaré.');
        }

        $selectedOption = $request->input('option_id');
        $option = Option::find($selectedOption);

        if (!$option || $option->poll_id !== $poll->id) {
            return redirect()->route('polls.error')->with('error', 'Foi seleccionada uma proposta inválida.');
        }

        DB::beginTransaction();
        try {
            $option->increment('vote_count');
            $voter->has_voted = true;
            $voter->save();

            // Saving the region, poll_id, voted_at, and option_id here
            $vote = new Vote([
                'poll_id' => $poll->id,
                'voted_at' => now(),
                'region' => $voter->region,
                'option_id' => $selectedOption
            ]);

            $selectedOption = $request->input('option_id');
            Log::info("Selected Option: $selectedOption"); // Debugging Line

            $vote->save();

            Log::info("Saved Vote: " . json_encode($vote)); // Debugging Line

            DB::commit();

            // After a successful vote, return the voteDetails view directly with the selected option data
            return view('polls.voteDetails', ['poll' => $poll, 'voter_choice' => $option, 'options' => $poll->options]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('polls.error')->with('error', 'Ocorreu um erro ao processar o seu voto. Por favor tente de novo. Se voltar a ocorrer o erro, por favor entre em contacto com o Município da Nazaré.');
        }
    }



    public function welcomePage()
    {
        // Fetch the active poll
        $poll = Poll::where('status', 'active')->first();

        // Determine if there's an active poll or not
        $isPollActive = $poll !== null;

        // If there's an active poll, fetch the options related to it
        $options = $isPollActive ? $poll->options : null;

        return view('welcome', compact('poll', 'options', 'isPollActive'));
    }


    public function voteDetails(Poll $poll)
    {
        $options = $poll->options;
        return view('polls.voteDetails', ['poll' => $poll, 'options' => $options]);
    }

    public function results(Poll $poll)
    {
        return view('polls.results', ['poll' => $poll]);
    }
}
