<?php

namespace App\Http\Controllers\views\front;

use App\Models\Event;
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

        return view('front.home.index', compact('events'));
    }
}
