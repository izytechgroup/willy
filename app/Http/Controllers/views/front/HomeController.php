<?php

namespace App\Http\Controllers\views\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index ()
    {
        return view('front.home.index');
    }
}
