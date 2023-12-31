<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
// use carbon
use App\Models\Reward;
use App\Models\Article;
use App\Models\Participation_type;
use App\Models\Participation;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::where("end_time", ">", date("Y-m-d H:i:s"))->get();
        if (count($challenges) == 0) {
            session()->flash('error', 'Il n\'y a pas de challenge en cours');
            return view("emission");
        } else {
            $types = $challenges->participation_types;
            return view("emission", compact("challenges, types"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('creation_challenge');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        /*
        "title" => "dsa"
        "description" => "sd"
        "type-photo" => "on"
        "type-video" => "on"
        "type-audio" => "on"
        "end_time" => "2023-06-05T14:58"
        "quantity-4" => "1" 
        */

        //if $request contains a string begining with "quantity-"
        if (preg_grep("/^quantity-/", array_keys($request->all()))) {
            $contest = true;
        } else {
            $contest = false;
        }

        $challenge = Challenge::create([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'end_time' => $request->input('end_time'),
            'ColorCoins_earned_by_participation' => $request->input('colorCoins'),
            'is_contest' => $contest,
        ]);
        if ($request->input("type-audio") == "on") {
            $challenge->participation_types()->attach(1);
        }

        if ($request->input("type-photo") == "on") {
            $challenge->participation_types()->attach(2);
        }
        if ($request->input("type-video") == "on") {
            $challenge->participation_types()->attach(3);
        }
        if ($request->input("type-text") == "on") {
            $challenge->participation_types()->attach(4);
        }

        if ($contest) {
            Article::all()->each(function ($article) use ($request, $challenge) {
                if ($request->input("quantity-" . $article->id)) {
                    Reward::create(
                        [
                            "quantity" => $request->input("quantity-" . $article->id),
                            "article_id" => $article->id,
                            "challenge_id" => $challenge->id,
                        ]
                    );
                }
            });
        }




        return redirect()->route("admin.dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $challenge = Challenge::findOrFail($id);
        $participations = $challenge->participations;
        return view('challengeDetails', compact('challenge', 'participations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Challenge::findOrFail($id)->delete();
        return redirect()->back();
    }

    // fonction qui permet de terminer un contest, la vue nous envoie l'id du gagnant, l'id de la participation et l'id du reward
    public function endContest(Request $request)
    {

        $participation_id = $request->input('participationGagnante');
        $participation = Participation::findOrFail($participation_id);
        $challenge = Challenge::findOrFail($participation->challenge_id);
        // get la reward en fonction du challenge_id qui correspond à la participation
        $rewards = $challenge->rewards;
        foreach ($rewards as $reward) {
            $reward->participation_id = $participation_id;
            $reward->save();
        }
        $challenge->start_time = $challenge->end_time;
        $challenge->save();
        session()->flash('success', 'Le concours a bien été terminé');
        return redirect()->route('admin.dashboard');
    }
}
