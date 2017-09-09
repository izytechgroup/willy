<?php

namespace App\Http\Controllers\api;

use DB;
use Storage;
use LaravelMP3;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    public function index (Request $request)
    {
        try
        {
            $limit = $request->limit ? $request->limit : 20;

            $songs = DB::table('songs')
            ->when($request->keywords, function ($q) use ($request) {
                return $q->where('songs.title', 'like', '%'.$request->limit.'%');
            })
            ->leftjoin('playlists', 'songs.playlist_id', 'playlists.id')
            ->where('status', 'published')
            ->select('songs.title', 'cover', 'duration', 'songs.number', 'link',
                'size', 'plays', 'downloads', 'playlist_id', 'playlists.title as playlist_title')
            ->take($limit)
            ->orderBy('songs.id', 'desc')
            ->get();

            return response()->json($songs);
        }
        catch (Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }
    }

    /**
     * [show description]
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    public function show ($number)
    {
        try
        {

            $songs = DB::table('songs')
            ->leftjoin('playlists', 'songs.playlist_id', 'playlists.id')
            ->where('status', '=', 'published')
            ->where('songs.number', '=', $number)
            ->select('songs.title', 'cover', 'duration', 'songs.number', 'link',
                'size', 'plays', 'downloads', 'playlist_id', 'playlists.title as playlist_title')
            ->first();

            return response()->json($songs);
        }
        catch (Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }
    }


    public function increment($number)
    {
        DB::table('songs')
        ->where('number', '=', $number)
        ->increment('plays');

        return response()->json('Incremented');;
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'link'  => 'required'
            ]);

            if($validator->fails()) {
                return response()->json('Bien vouloir préciser le titre et un lien MP3', self::HTTP_BADREQUEST);
            }

            $song = Song::find($request->id);
            if (!$song) {
                return response()->json('No song found', self::HTTP_BADREQUEST);
            }

            $link = str_replace(asset('/'), '', $request->link);
            $size = Storage::size($link);
            $duration = LaravelMP3::getDuration($link);

            $song->duration = $duration;
            $song->title    = $request->title;
            $song->link     = $request->link;
            $song->size     = $size;
            $song->save();

            return response()->json($song);
        }
        catch (Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }
    }


    public function downloads ($number)
    {
        try
        {
            $song = Song::where('number', $number)->first();
            $file = public_path() . $song->link;
            $song->downloads = $song->downloads + 1;
            $song->save();
            
            return response()->download($file, $song->title . '.mp3');
        }
        catch (Exception $e) {
            return response()->json($e->getMessage(), self::HTTP_ERROR);
        }

    }
}
