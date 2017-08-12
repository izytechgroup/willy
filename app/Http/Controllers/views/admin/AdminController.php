<?php

namespace App\Http\Controllers\views\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function home()
    {
        $users = DB::table('users')->count();
        $songs = DB::table('songs')->count();
        $videos = DB::table('videos')->count();

        return view('admin.all.dashboard', compact('users', 'songs', 'videos'));
    }




    public function files()
    {
        return view('admin.all.files');
    }
}
