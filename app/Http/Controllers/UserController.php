<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        User::create([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'nickname' => $request->input('nickname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            "color_coins" => 10,
        ]);
        session()->flash('success', 'Ton compte a bien été créé ! Connecte toi !');
        redirect("/home")->with("success", "L'utilisateur " . $request->input('name') . " a été créé");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        //return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::findOrFail($id)->update($request->all());
        // return view('dashboard')->withOk("L'utilisateur " . $request->input('name') . " a été modifié");
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }


    public function getParticipations()
    {
        //dd(Auth::user()->id);

        if (Auth::check() == false) {
            session()->flash('error', 'Tu dois être connecté !');
            return redirect("/login");
        } else {
            $participations = User::findOrFail(Auth::user()->id)->participations;
            $challengesEtParticipations = [];
            //get challenge from each participations
            if ($participations->isEmpty()) {
                session()->flash('error', 'Tu n\'as pas encore participé à un challenge !');
                return view("dashboard", compact("challengesEtParticipations"));
            }
            foreach ($participations as $participation) {
                $challengesEtParticipations[$participation->id] = [$participation, $participation->challenge];
            }
            return view("dashboard", compact("challengesEtParticipations"));
        }
    }
}
