<?php

namespace App\Http\Controllers\views\front;

use App\Models\Event;
use App\Models\Song;
use App\Models\Video;
use App\Models\PlayList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index (Request $request)
    {
        $status = null;
        if ( $request->has('status') && $request->status != '' ) {
            if ( in_array($request->status, ['published', 'unpublished']) ) {
                $status = $request->status;
            }
        }

        $keywords = $request->keywords;

        $events = Event::when($keywords, function($query) use ($keywords) {
            return $query->where('title', 'like', '%'.$keywords.'%');
        })
        ->when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })
        ->orderBy('id', 'desc')
        ->paginate(self::PAGINATE_NB);

        return view('front.events.index', compact('events'));
    }
}
