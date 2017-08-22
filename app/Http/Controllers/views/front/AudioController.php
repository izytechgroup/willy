<?php

namespace App\Http\Controllers\views\front;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AudioController extends Controller
{

    public function index(Request $request)
    {
        $playlists = [];
        $songs = [];

        return view('front.audio.index', compact('playlists', 'songs'));
    }
}
