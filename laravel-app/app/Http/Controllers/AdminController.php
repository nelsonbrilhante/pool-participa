<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOptionRequest;
use App\Http\Requests\CreatePollRequest;
use App\Models\Poll;
use App\Models\Option;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (auth()->user() && auth()->user()->is_admin) {
            Log::info('Dashboard method accessed');

            // Fetch the current poll and its options
            $poll = Poll::where('singleton', true)->with('options')->first();

            return view('admin.dashboard', compact('poll'));
        }
        return redirect('/'); // Redirect to home if not an admin. Adjust as necessary.
    }



    public function createPoll(CreatePollRequest $request)
    {
        if (Poll::where('singleton', true)->exists()) {
            return redirect()->route('admin.dashboard')->with('error', 'A poll already exists.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'active',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Poll created successfully!');
    }


    public function addOption(AddOptionRequest $request, Poll $poll)
    {
        Option::create([
            'poll_id' => $poll->id,
            'project_number' => $request->project_number,
            'owner' => $request->owner,
            'theme' => $request->theme,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Option added successfully!');
    }


    public function statistics()
    {
        $polls = Poll::all();
        return view('admin.statistics', ['polls' => $polls]);
    }

    public function manageVoters()
    {
        $voters = Voter::all();
        return view('admin.manage_voters', ['voters' => $voters]);
    }

    public function showCreatePollForm()
    {
        if (auth()->user() && auth()->user()->is_admin) {
            return view('admin.createPoll');
        }
        return redirect('/'); // Redirect to home if not an admin.
    }


    public function showAddOptionForm()
    {
        $poll = Poll::where('singleton', true)->firstOrFail();
        return view('admin.add_option', ['poll' => $poll]);
    }

    public function showEditOptionForm($optionId)
    {
        $option = Option::findOrFail($optionId);
        return view('admin.edit_option', ['option' => $option]);
    }



    public function editPoll()
    {
        $poll = Poll::where('singleton', true)->firstOrFail();

        // Return the poll to a view, for example:
        return view('admin.edit_poll', ['poll' => $poll]);
    }

    public function updatePoll(Request $request)
    {
        $poll = Poll::where('singleton', true)->firstOrFail();

        // Validate and update the poll's data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $poll->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Poll updated successfully!');
    }
}
