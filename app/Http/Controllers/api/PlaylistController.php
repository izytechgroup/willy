<?php

namespace App\Http\Controllers\api;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    public function index (Request $request)
    {
        try
        {
            $result = Playlist::canDisplay()
            ->audio()
            ->latest()
            ->withCount('songs')
            ->get();

            return response()->json($result);
        }
        catch (Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }

    }
}
