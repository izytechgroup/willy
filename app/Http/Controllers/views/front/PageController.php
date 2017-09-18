<?php

namespace App\Http\Controllers\views\front;

use Storage;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function location () {
        $p = Page::where('slug', 'location')->first();
        $images = Storage::files('/docs/images/sliders/location');
        return view('front.pages.location', compact('p', 'images'));
    }

    public function academie () {
        $p = Page::where('slug', 'academie')->first();
        $images = Storage::files('/docs/images/sliders/academie');
        return view('front.pages.academie', compact('p', 'images'));
    }

    public function don () {
        $p = Page::where('slug', 'don')->first();
        return view('front.pages.don', compact('p'));
    }

    public function contact () {
        return view('front.pages.contact');
    }

    public function biomedical () {
        $p = Page::where('slug', 'biomedical')->first();
        $images = Storage::files('/docs/images/sliders/biomedical');
        return view('front.pages.biomedical');
    }
}
