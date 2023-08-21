<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Option;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Http\Request;

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
        $voter = Voter::find(session('voter_id'));

        if (!$voter || $voter->has_voted) {
            return redirect()->route('polls.index')->with('error', 'You have already voted or are not authorized.');
        }

        $selectedOption = $request->input('option');
        $option = Option::find($selectedOption);

        if (!$option || $option->poll_id !== $poll->id) {
            return redirect()->back()->with('error', 'Invalid option selected.');
        }

        // Record the vote
        $option->increment('vote_count');
        $voter->update(['has_voted' => true]);
        Vote::create(['poll_id' => $poll->id, 'voted_at' => now()]);

        return redirect()->route('polls.index')->with('success', 'Thank you for voting!');
    }

    public function results(Poll $poll)
    {
        return view('polls.results', ['poll' => $poll]);
    }

}
