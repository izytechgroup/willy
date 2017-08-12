<?php

namespace App\Http\Controllers\views\admin;

use App\Models\Playlist;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SongPlaylistController extends Controller
{
    use SlugTrait;
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
        $slug = $this->getUniqueSlug($request->slug, $this->table);

        $playlist = Playlist::create([
            'title'  => $request->title,
            'cover'  => $request->cover,
            'status' => $request->status,
            'slug'   => $slug
        ]);

        return redirect()->route('audio.playlist.show', $playlist->id);
    }
}
