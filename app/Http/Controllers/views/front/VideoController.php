<?php

namespace App\Http\Controllers\views\front;

use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    public function index (Request $request)
    {
        try
        {
            $main = Video::canDisplay()
            ->where('is_static', true)
            ->last();

            $playlists = Playlist::has('videos')
            ->video()->orderBy('title')->get();

            if (!$main){
                $videos = [];
                return view('front.videos.index', compact('videos', 'main', 'playlists'));
            }

            $status = null;
            if ( $request->has('status') && $request->status != '' ) {
                if ( in_array($request->status, ['published', 'unpublished']) ) {
                    $status = $request->status;
                }
            }

            $keywords = $request->keywords;

            $videos = Video::when($keywords, function($query) use ($keywords) {
                return $query->where('title', 'like', '%'.$keywords.'%');
            })
            ->when($request->playlist, function($query) use ($request) {
                return $query->join('playlists', 'playlists.id', 'videos.playlist_id')
                ->where('playlists.number', $request->playlist);
            })
            ->where('videos.id', '!=', $main->id)
            ->orderBy('videos.id', 'desc')
            ->paginate(24);

            return view('front.videos.index', compact('videos', 'main', 'playlists'));
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }


    public function show ($number)
    {
        try
        {
            $video = Video::canDisplay()
            ->where('number', $number)
            ->first();

            if (!$video) {
                return redirect()->route('videos.all');
            }

            $playlist = Video::canDisplay()
            ->where('playlist_id', $video->playlist_id)
            ->different($number)
            ->latest()
            ->take(6)
            ->get();

            $videos = Video::canDisplay()
            ->latest()
            ->where('playlist_id', '!=', $video->playlist_id)
            ->take(12)
            ->get();

            return view('front.videos.show', compact('video', 'videos', 'playlist'));
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }
}
