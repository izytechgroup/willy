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
            return $query->where('title', 'like', '%'.$keywords.'%')
            ->orWhere('country', 'like', '%'.$keywords.'%');
        })
        ->when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })
        ->orderBy('date')
        ->paginate(self::PAGINATE_NB);

        return view('front.events.index2', compact('events'));
    }



    public function show ($slug)
    {
        $event = Event::where('slug', $slug)->first();
        if (!$event) {
            abort(404);
        }

        $events = Event::canDisplay()
        ->upcoming()
        ->closest()
        ->where('id', '!=', $event->id)
        ->take(2)
        ->get();

        return view('front.events.show', compact('event', 'events'));
    }
}
