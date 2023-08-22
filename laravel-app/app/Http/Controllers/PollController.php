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
        // Enable SQL query logging for debugging purposes
        DB::enableQueryLog();

        Log::info('Request Data:', $request->all());

        // Fetch voter based on id_number instead of id
        $voter = Voter::where('id_number', session('voter_id'))->first();

        if (!$voter || $voter->has_voted) {
            // Logging the condition for debugging
            Log::info('Vote attempt failed:', ['reason' => 'Voter not found or already voted']);

            // Redirect to error view
            return redirect()->route('polls.error')->with('error', 'You have already voted or are not authorized.');
        }

        $selectedOption = $request->input('option_id');
        $option = Option::find($selectedOption);

        if (!$option || $option->poll_id !== $poll->id) {
            // Logging the condition for debugging
            Log::info('Vote attempt failed:', ['reason' => 'Invalid option selected', 'selectedOption' => $selectedOption]);

            return redirect()->route('polls.error')->with('error', 'Invalid option selected.');
        }

        $option->increment('vote_count');

        // Record the vote
        DB::beginTransaction();
        try {
            // Increment option's vote_count and save
            $option->vote_count += 1;
            $saveOption = $option->save();

            // Update voter's has_voted status and save
            $voter->has_voted = true;
            $saveVoter = $voter->save();

            // Create a new vote record and save
            $vote = new Vote(['poll_id' => $poll->id, 'voted_at' => now()]);
            $saveVote = $vote->save();

            // Logging the status of each save operation for debugging
            Log::info('Option save status:', ['status' => $saveOption]);
            Log::info('Voter save status:', ['status' => $saveVoter]);
            Log::info('Vote save status:', ['status' => $saveVote]);

            // If all operations are successful, commit the transaction
            DB::commit();

            // Redirect to vote details view
            return redirect()->route('polls.voteDetails', ['poll' => $poll->id]);
        } catch (\Exception $e) {
            // Rollback the transaction in case of any errors
            DB::rollback();

            // Log the exception message for debugging
            Log::error('Vote error:', ['error' => $e->getMessage()]);

            // Redirect to error view with a generic error message
            return redirect()->route('polls.error')->with('error', 'There was an error processing your vote.');
        } finally {
            // Log all SQL queries that were run during this request for debugging
            $log = DB::getQueryLog();
            Log::info('SQL Queries:', $log);
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
