<?php

namespace App\Http\Controllers\api;

use Storage;
use LaravelMP3;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{

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
}
