<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOptionRequest;
use App\Http\Requests\CreatePollRequest;
use App\Models\Option;
use App\Models\Poll;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (auth()->user() && auth()->user()->is_admin) {
            $poll = Poll::where('singleton', true)->with('options')->first();
            return view('admin.dashboard', compact('poll'));
        }
        return redirect('/');
    }

    public function createPoll(CreatePollRequest $request)
    {
        if (Poll::where('singleton', true)->exists()) {
            return redirect()->route('admin.dashboard')->with('error', 'Uma votação já existe.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Votação criada com sucesso!');
    }

    public function addOption(AddOptionRequest $request, Poll $poll)
    {
        $this->authorize('create', Option::class);

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
        foreach ($polls as $poll) {
            $poll->options = $poll->options()->orderByDesc('vote_count')->get();
        }
        return view('admin.statistics', ['polls' => $polls]);
    }

    public function manageVoters()
    {
        $voters = Voter::all();
        $regions = Voter::select('region')->distinct()->pluck('region');
        $totalVoters = Voter::count();
        $regionCounts = Voter::select('region', DB::raw('count(*) as count'))
            ->groupBy('region')
            ->pluck('count', 'region');

        return view('admin.manage_voters', [
            'voters' => $voters,
            'regions' => $regions,
            'totalVoters' => $totalVoters,
            'regionCounts' => $regionCounts
        ]);
    }

    public function showCreatePollForm()
    {
        if (auth()->user() && auth()->user()->is_admin) {
            if (Poll::where('singleton', true)->exists()) {
                return redirect()->route('admin.dashboard')->with('error', 'Uma votação já existe.');
            }
            return view('polls.create');
        }
        return redirect('/');
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
        $poll = Poll::where('singleton', true)->first();
        return view('polls.edit', compact('poll'));
    }

    public function updatePoll(Request $request)
    {
        $poll = Poll::where('singleton', true)->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $poll->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Poll updated successfully!');
    }

    public function searchVoters(Request $request)
    {
        $query = $request->get('query');
        $region = $request->get('region');

        $votersQuery = DB::table('voters');

        if ($query) {
            $votersQuery->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('id_number', 'LIKE', '%' . $query . '%');
            });
        }

        if ($region) {
            $votersQuery->where('region', $region);
        }

        $voters = $votersQuery->get();
        return view('voter.partials.voters_table', ['voters' => $voters]);
    }
}
