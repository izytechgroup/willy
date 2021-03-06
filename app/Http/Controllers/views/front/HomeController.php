<?php

namespace App\Http\Controllers\views\front;

use Storage;
use App\Models\Event;
use App\Models\Song;
use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index ()
    {
        $events = Event::canDisplay()
            ->orderBy('date')
            ->take(2)
            ->get();

        $songs  = Song::orderBy('id')
            ->with('playlist')
            ->take(4)
            ->get();

        $playlists  = PlayList::where('type', 'audio')
        ->with('songs')
        ->orderBy('id')
        ->take(4)
        ->get();

        $mainVideo = Video::where('is_static', true)
        ->canDisplay()
        ->orderBy('id', 'desc')
        ->first();

        if (!$mainVideo) {
            $mainVideo = Video::orderBy('id', 'desc')
            ->canDisplay()
            ->first();
        }

        $videos = Video::orderBy('id', 'desc')
        ->where('id', '!=', $mainVideo->id)
        ->take(4)
        ->get();

        $directory = '/docs/images/sliders/home';
        $images = Storage::files($directory);

        return view('front.home.index', compact('events', 'songs', 'playlists', 'videos', 'images', 'mainVideo'));
    }
}
