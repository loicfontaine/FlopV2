<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function formSubmit(Request $request)
    {
        /*
        dd($request->all());
          "audio" => "undefined"
  "textField" => "eeee"
  "video" => "undefined"
  "image" => Illuminate\Http\UploadedFile {#1350
    -test: false
    -originalName: "skype-512.png"
    -mimeType: "image/png"
    -error: 0
    #hashName: null
    path: "/tmp"
    filename: "phpnoMAkK"
    basename: "phpnoMAkK"
    pathname: "/tmp/phpnoMAkK"
    extension: ""
    realPath: "/tmp/phpnoMAkK"
    aTime: 2023-06-12 15:24:12
    mTime: 2023-06-12 15:24:12
    cTime: 2023-06-12 15:24:12
    inode: 2248689
    size: 1375182
    perms: 0100600
    owner: 33
    group: 33
    type: "file"
    writable: true
    readable: true
    executable: false
    file: true
    dir: false
    link: false
        */

        if(Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            //erreur session
            session()->flash('error', 'Tu dois être connecté pour participer !');
            return response()->json(['error' => 'You must be logged in.']);
        }

        if (Participation::where("user_id", "=", $userId)->where("challenge_id", "=", $request->input("challenge_id"))->first()) {
            session()->flash('error', 'Tu as déjà participé à ce défi !');
            return response()->json(['error' => 'You already participated to this challenge.']);
        } else {


    
        $participation = new Participation();
           $participation->user_id = $userId;
            $participation->challenge_id = $request->input("challenge_id");
        $participation->save();
        

        if ($request->image != "undefined") {
            $fileName = $this->storeFile($request->image);
            $image = Content::create([
                "text" => $fileName,
                "participation_id" => $participation->id,
                "participation_type_id" => 2,
            ]);
            $image->participation()->associate($participation);
            $image->save();
            
        }

        if ($request->video != "undefined") {
            $fileName = $this->storeFile($request->video);
            $video = Content::create([
                "text" => $fileName,
                "participation_id" => $participation->id,
                "participation_type_id" => 3,
            ]);
            $video->participation()->associate($participation);
            $video->save();
    
        }

        if ($request->audioBlob) {
            $file = $request->audioBlob;
            $fileName = time() . '.' . $file->getClientOriginalExtension() . "wav";
            $file->move('/home/projart/2023/50/flop/flop-laravel/storage/app/public/participation', $fileName);
            $audio = Content::create([
                "text" => $fileName,
                "participation_id" => $participation->id,
                "participation_type_id" => 1,
            ]);
        }
        if ($request->message) {
            $message = Content::create([
                "text" => $request->message,
                "participation_id" => $participation->id,
                "participation_type_id" => 4,
            ]);
            $message->participation()->associate($participation);
            $message->save(); }
        

            session()->flash('success', 'Ta participation a bien été uploadée !');
            return redirect()->route('home');
        }
    }
    

    private function storeFile($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('/home/projart/2023/50/flop/flop-laravel/storage/app/public/participation', $fileName);
        return $fileName;
    }
}
