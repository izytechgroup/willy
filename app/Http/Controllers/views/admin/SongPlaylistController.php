<?php

namespace App\Http\Controllers\views\admin;

use App\Models\Playlist;
use App\Traits\SlugTrait;
use App\Traits\UtilTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SongPlaylistController extends Controller
{
    use SlugTrait, UtilTrait;
    protected $table = 'playlists';

    public function create()
    {
        return view('admin.songs.create');
    }

    public function edit($id)
    {
        $playlist = Playlist::find($id);
        if (!$playlist) return redirect()->route('songs.index');

        return view('admin.songs.edit', compact('playlist'));
    }

    public function show($id)
    {
        $playlist = Playlist::with('songs')
        ->where('id', $id)
        ->first();

        if (!$playlist) return redirect()->route('songs.index');

        return view('admin.songs.show', compact('playlist'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cover'  => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors(['validator' => 'Bien vouloir preciser le titre et la couverture']);
        }

        $playlist = Playlist::create([
            'title'     => $request->title,
            'cover'     => $request->cover,
            'status'    => $request->status,
            'number'    => $this->makePlaylistNumber(),
            'cover_md'  => str_replace('/images//', '/md//', $request->cover),
            'cover_sm'  => str_replace('/images//', '/sm//', $request->cover)
        ]);

        return redirect()->route('audio.playlist.edit', $playlist->id);
    }


    public function update(Request $request, $id)
    {
        $playlist = Playlist::find($id);
        if (!$playlist) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cover'  => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors(['validator' => 'Bien vouloir preciser le titre et la couverture']);
        }

        $playlist->title = $request->title;
        $playlist->cover = $request->cover;
        $playlist->cover_md = str_replace('/images//', '/md//', $request->cover);
        $playlist->cover_sm = str_replace('/images//', '/sm//', $request->cover);
        $playlist->save();

        return redirect()->route('audio.playlist.edit', $playlist->id)
        ->with('message', 'Playlist mise à jour');
    }
}
