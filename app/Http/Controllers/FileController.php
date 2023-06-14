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
        if (Participation::where("user_id", "=", $request->input("user_id"))->where("challenge_id", "=", $request->input("challenge_id"))->first()) {
            session()->flash('error', 'Tu as déjà participer à ce défi !');
        } else {

        if(Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            //erreur session
            return response()->json(['error' => 'You must be logged in.']);
        }
    
        $participation = new Participation();
           $participation->user_id = $userId;
            //$participation->challenge_id = $request->input("challenge_id");
            $participation->challenge_id = 1;
        $participation->save();
        
try {
        if ($request->image != "undefined") {
            $fileName = $this->storeFile($request->image);
            $content = Content::create([
                "texte" => $fileName,
                "participation_id" => $participation->id,
            ]);
            $content->participation()->associate($participation);
            $content->save();
            return response()->json(['success' => 'You have successfully uploaded image.']);
        }

        if ($request->video != "undefined") {
            $fileName = $this->storeFile($request->video);
            $content = Content::create([
                "texte" => $fileName,
                "participation_id" => $participation->id,
            ]);
            $content->participation()->associate($participation);
            $content->save();
            return response()->json(['success' => 'You have successfully uploaded video.']);
        }

        if ($request->audioBlob != "undefined") {
            $file = $request->audioBlob;
            $fileName = time() . '.' . $file->getClientOriginalExtension() . "wav";
            $file->move('/home/projart/2023/50/flop/flop-laravel/storage/app/public/participation', $fileName);
            $content = Content::create([
                "texte" => $fileName,
                "participation_id" => $participation->id,
            ]);

            if ($request->message) {
                $content = Content::create([
                    "texte" => $request->message,
                ]);
                $content->participation()->associate($participation);
                $content->save(); }


        }
        } catch (\Exception $e) {
            session()->flash('error', 'Ta participation n\'a pas pu être uploadée !');
        }
            $content->participation()->associate($participation);
            $content->save();
            session()->flash('success', 'Ta participation a bien été uploadée !');
            return response()->json(['success' => 'You have successfully uploaded audio.']);
        }
    }
    

    private function storeFile($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('/home/projart/2023/50/flop/flop-laravel/storage/app/public/participation', $fileName);
        return $fileName;
    }
}
