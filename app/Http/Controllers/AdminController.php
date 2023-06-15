<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Challenge;
use App\Models\Participation;
use App\Models\Content;
use App\Models\Participation_type;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);
    }
*/

    public function dashboard()
    {
        $articles = Article::all();
        // LIST OF CHALLENGES
        // get current datetime
        $now = now();
        // get last poll created
        $poll = Poll::orderBy("id", "desc")->first();
        $poll->options;
        $nbVotes = [];
        foreach($poll->options as $option){
            $nbVotes[$option->id] = count($option->users);
        }



        // get challenges that end_time is greater than $now ordered by desc

        $challenge = Challenge::where('is_contest', '=', 0)->orderBy("id", "desc")->first();
      
            $arrayParticipations = $challenge->participations;
            foreach ($arrayParticipations as $participation) {
                $participation->contents;
            }
        

        //$contests = Challenge::where('is_contest', '=', 1)->orderBy("end_time", "desc")->get();
    
        $contests = Challenge::join('rewards', 'challenges.id', '=', 'rewards.challenge_id')
        ->where('is_contest', 1)
        ->whereNull('rewards.participation_id')
        ->get();

        foreach ($contests as $contest) {
            $arrayParticipations = $contest->participations;

            foreach ($arrayParticipations as $participation) {
                $participation->contents;
                $participation->user;
            }
        }
        dd($contest);
        //return response()->json(array("articles" => $articles, "polls" => $polls, "challenges" => $challenges, "contests" => $contests));
        return view("admin_dashboard", compact("articles", "poll", "challenge", "contests", "nbVotes"));
    }
}
