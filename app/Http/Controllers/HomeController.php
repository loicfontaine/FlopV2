<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Poll as Sondage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getInfo()
    {
        $challenges = Challenge::where("end_time", ">", date("Y-m-d H:i:s"))->get();

        $challengesRewards = [];
        foreach ($challenges as $challenge) {
            if ($challenge->is_contest) {
                $challengesRewards[$challenge->id] = ["challenge" => $challenge];
            } else {
                $challengesRewards[$challenge->id] = ["challenge" => $challenge];
            }
        }
        // get all polls where start_date + duration > now
        $sondages = Sondage::whereRaw("DATE_ADD(start_date, INTERVAL duration MINUTE) > NOW()")->get();

        $pollArray = [];

        foreach ($sondages as $sondage) {
            // stocke les infos du sondage dans le tableau $pollArray
            $pollArray[$sondage->id] = ["poll" => $sondage];

        }

        return response()->json(array("challenges" => $challengesRewards, "sondages" => [$pollArray]));
    }
}
