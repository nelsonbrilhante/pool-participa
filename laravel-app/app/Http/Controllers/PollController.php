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
        return view('polls.index', ['polls' => $activePolls]);
    }

    public function show(Poll $poll)
    {
        return view('polls.show', ['poll' => $poll]);

    }

    public function vote(Request $request, Poll $poll)
    {
        // Fetch voter based on id_number instead of id
        $voter = Voter::where('id_number', session('voter_id'))->first();

        // Check if voter has already voted or is not authorized
        if (!$voter || $voter->has_voted) {
            return redirect()->route('polls.error')->with('error', 'You have already voted or are not authorized.');
        }

        // Fetch the selected option
        $selectedOption = $request->input('option_id');
        $option = Option::find($selectedOption);

        // Check if the selected option is valid
        if (!$option || $option->poll_id !== $poll->id) {
            return redirect()->route('polls.error')->with('error', 'Invalid option selected.');
        }

        // Begin the transaction
        DB::beginTransaction();
        try {
            // Increment the vote count for the selected option
            $option->increment('vote_count');

            // Mark the voter as having voted
            $voter->has_voted = true;
            $voter->save();

            // Record the vote in the votes table
            $vote = new Vote(['poll_id' => $poll->id, 'voted_at' => now()]);
            $vote->save();

            // Commit the transaction
            DB::commit();

            // Redirect to the vote details view
            return redirect()->route('polls.voteDetails', ['poll' => $poll->id]);
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollback();

            // Redirect to error view with a generic error message
            return redirect()->route('polls.error')->with('error', 'There was an error processing your vote.');
        }
    }



    public function voteDetails(Poll $poll)
    {
        // Fetch details related to the vote. This is just an example, adjust according to your application needs.
        $options = $poll->options; // assuming there's a relationship set for options in the Poll model

        return view('polls.voteDetails', ['poll' => $poll, 'options' => $options]);
    }



    public function results(Poll $poll)
    {
        return view('polls.results', ['poll' => $poll]);
    }

}
