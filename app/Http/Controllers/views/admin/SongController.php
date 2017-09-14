<?php

namespace App\Http\Controllers\views\admin;

use Storage;
use LaravelMP3;
use App\Models\Song;
use App\Traits\UtilTrait;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    use UtilTrait;

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

        Song::create([
            'playlist_id'   => $id,
            'link'          => $request->link,
            'title'         => $request->title,
            'artist'        => $request->artist,
            'genre'         => $request->genre,
            'duration'      => $request->duration,
            'size'          => $request->size,
            'can_download'  => $request->can_download,
            'number'        => $this->makeSongNumber(),
            'plays'         => 0,
            'downloads'     => 0
        ]);

        return redirect()->back()->with('message', 'La piste a bien été ajoutée');
    }
}
