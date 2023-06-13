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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);
    }


    public function dashboard()
    {
        $articles = Article::all();
            // LIST OF CHALLENGES
            // get current datetime
            $now = date("Y-m-d H:i:s");
            // get all polls
            $polls = Poll::all();
            // get challenges that end_time is greater than $now ordered by desc
            $challenges = Challenge::where("end_time", ">", $now)->where('is_contest', '=', 0)->orderBy("end_time", "desc")->get();
            $contests = Challenge::where("end_time", ">", $now)->where('is_contest', '=', 1)->orderBy("end_time", "desc")->get();
            // get all data from participation table
            $participations = Participation::all();
            //get all from options table
            $options = Option::all();
            // get contents from table contents
            $contents = Content::all();

         return view("admin_dashboard", compact("articles", "polls", "challenges", "contests", "participations", "options", "contents"));
    }
}