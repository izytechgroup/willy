<?php

namespace App\Http\Controllers\views\admin;

use Storage;
use LaravelMP3;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    public function index ()
    {
        $playlists = Playlist::where('type', 'audio')
        ->orderBy('id', 'desc')->get();
        return view('admin.songs.index', compact('playlists'));
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link'  => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors(['validator' => 'Bien vouloir preciser un lien MP3']);
        }

        $link = str_replace(asset('/'), '', $request->link);
        $size = Storage::size($link);
        $duration = LaravelMP3::getDuration($link);

        Song::create([
            'playlist_id'   => $id,
            'link'          => $request->link,
            'title'         => $request->title,
            'duration'      => $duration,
            'size'          => $size,
            'plays'         => 0,
            'downloads'     => 0
        ]);

        return redirect()->back()->with('message', 'La piste a bien été ajoutée');
    }
}
