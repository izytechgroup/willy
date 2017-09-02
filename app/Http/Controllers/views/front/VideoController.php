<?php

namespace App\Http\Controllers\views\front;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    public function index (Request $request)
    {
        try
        {
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
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(24);

            return view('front.videos.index', compact('videos'));
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

            $videos = Video::canDisplay()
            ->latest()
            ->different($number)
            ->take(4)
            ->get();

            return view('front.videos.show', compact('video', 'videos'));
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }
}
