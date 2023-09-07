<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Poll;
use App\Models\Vote;
use App\Models\Voter;

class StatisticsController extends Controller
{
    public function showStatistics()
    {
        // Fetch all the polls along with their options ordered by vote_count in descending order
        $polls = Poll::with([
            'options' => function ($query) {
                $query->orderBy('project_number');
            }
        ])->get();

        $totalVotesPerPoll = [];
        $votePercentagesPerPoll = [];
        $votesPerRegion = [];
        $votesPerOptionPerRegion = [];
        $totalVoters = Voter::count();  // Fetch the total number of voters

        foreach ($polls as $poll) {
            $totalVotes = Vote::where('poll_id', $poll->id)->count();
            $totalVotesPerPoll[$poll->id] = $totalVotes;

            foreach ($poll->options as $option) {
                $votePercentagesPerPoll[$option->id] = $totalVotes ? ($option->vote_count / $totalVotes) * 100 : 0;

                // Fetch votes per option per region
                $votesPerOptionPerRegion[$option->id] = DB::table('votes')
                    ->where('poll_id', $poll->id)
                    ->where('option_id', $option->id)
                    ->select('region', DB::raw('count(*) as vote_count'))
                    ->groupBy('region')
                    ->pluck('vote_count', 'region')
                    ->toArray();
            }

            // Fetch votes per region for the current poll
            $votesPerRegion[$poll->id] = DB::table('votes')
                ->where('poll_id', $poll->id)
                ->select('region', DB::raw('count(*) as vote_count'))
                ->groupBy('region')
                ->pluck('vote_count', 'region')
                ->toArray();
        }

        return view('admin.statistics', compact('polls', 'totalVotesPerPoll', 'votePercentagesPerPoll', 'votesPerRegion', 'votesPerOptionPerRegion', 'totalVoters'));
    }
}
