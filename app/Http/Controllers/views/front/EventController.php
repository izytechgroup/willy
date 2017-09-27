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
        $keywords = $request->keywords;

        $events = Event::when($keywords, function($query) use ($keywords) {
            return $query->where('title', 'like', '%'.$keywords.'%')
            ->orWhere('address', 'like', '%'.$keywords.'%');
        })
        ->when($request->type, function($query) use ($request) {
            return $query->where('type', $request->type);
        })
        ->when($request->month, function($query) use ($request) {
            return $query->whereMonth('date', $request->month);
        })
        ->when($request->country, function($query) use ($request) {
            return $query->where('country', $request->country);
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
