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
                $challengesRewards[$challenge->id] = ["challenge" => $challenge, "rewards" => $challenge->rewards, "participation_types" => $challenge->participation_types];
            } else {
                $challengesRewards[$challenge->id] = ["challenge" => $challenge, "participation_types" => $challenge->participation_types];
            }
        }
        
        $sondages = Sondage::where("end_time", ">", date("Y-m-d H:i:s"))->get();

        $pollArray = [];
        $optionsPourLesSondages = [];

        foreach($sondages as $sondage) {
            // stocke les infos du sondage dans le tableau $pollArray
            $pollArray[$sondage->id] = ["id" => $sondage->id, "title" => $sondage->title, "description" => $sondage->description, "start_date" => $sondage->start_date, "duration" => $sondage->duration, "options" => $sondage->options];
            // va chercher les options du sondage
            $pollOptions = DB::table('options')->where('poll_id', $sondage->id)->get();
            // stocke les options du sondage dans le tableau $pollOptions
            $optionsPourLesSondages[$pollOptions->id] = DB::table('options')->where('poll_id', $sondage->id)->get();
        }
        
        return response()->json(array("challenges" => $challengesRewards, "sondages" => [$pollArray], "options" => [$optionsPourLesSondages]));
    }
}