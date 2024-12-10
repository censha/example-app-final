<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Photo;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index($id){
        $actor = Actor::find($id);
        $films = Film::join('videosapp_video_acter', 'videosapp_video.id', '=', 'videosapp_video_acter.video_id')
        ->join('authorsapp_authors', 'authorsapp_authors.id', '=','videosapp_video_acter.authors_id')
        ->select(
            //'authorsapp_authors.*',
            'videosapp_video.*'
        )
        ->get();
        $photos = Photo::where('author_hoto_id', $id)->get();
        if(count($photos) ==null)
        $photos = null;
        //dd($actor);
        return inertia('ActorView',[
            'actor' => $actor,
            'films' => $films,
            'photos' => $photos
    ]);
    }
}
