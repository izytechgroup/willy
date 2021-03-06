<?php

namespace App\Http\Controllers\views\admin;

use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{

    /**
     * [index description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        try
        {
            $status = null;
            if ( $request->has('status') && $request->status != '' ) {
                if ( in_array($request->status, ['published', 'unpublished']) ) {
                    $status = $request->status;
                }
            }

            $keywords = $request->keywords;

            $videos = Video::when($keywords, function($query) use ($keywords) {
                return $query->where('title', 'like', '%'.$keywords.'%');
            })
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(20);

            return view('admin.videos.index', ['videos' => $videos]);
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }


    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        try {
            $playlists = Playlist::where('type', 'video')->get();
            return view('admin.videos.create', compact('playlists'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }


    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        try {
            $video = Video::find($id);
            if (!$video) {
                return redirect()->route('videos.index');
            }

            $playlists = Playlist::where('type', 'video')->get();
            return view('admin.videos.edit', compact('video', 'playlists'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }

    }



    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'origin_id' => 'required'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors(['validator' => 'Bien vouloir remplir tous les champs']);
            }

            $number = 10031451;

            $lastVideo = Video::orderBy('id', 'desc')->first();
            if ($lastVideo) {
                $number = $lastVideo->number += rand(19,97);
            }

            $thumbnail = null;

            if ($request->origin === 'vimeo') {
                $resJson = $this->getVimeoImage($request->origin_id);
                if ($resJson)
                    $thumbnail = $resJson['thumbnail_large'];
            }
            else {
                // Youtube
                $thumbnail = 'https://img.youtube.com/vi/'.$request->origin_id.'/mqdefault.jpg';
            }

            $video = Video::create([
                'title' => $request->title,
                'status' => $request->status,
                'origin' => $request->origin,
                'number' => $number,
                'thumbnail' => $thumbnail,
                'origin_id' => $request->origin_id,
                'playlist_id' => $request->playlist_id,
                'is_static'   => (bool) $request->is_static
            ]);

            return redirect()->route('videos.edit', $video->id);
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }


    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'title'     => 'required',
                'origin_id' => 'required'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors(['validator' => 'Bien vouloir preciser tous les champs']);
            }

            $video = Video::find($id);
            if (!$video) {
                return redirect()->route('videos.index');
            }

            if ($request->origin === 'vimeo') {
                if ( $video->thumbnail == null){
                    // Get image
                    $resJson = $this->getVimeoImage($request->origin_id);
                    if ($resJson)
                        $video->thumbnail = $resJson['thumbnail_large'];
                }
            }
            else {
                // Youtube
                $video->thumbnail = 'https://img.youtube.com/vi/'.$request->origin_id.'/mqdefault.jpg';
            }

            $video->title = $request->title;
            $video->playlist_id = $request->playlist_id;
            $video->origin_id = $request->origin_id;
            $video->origin = $request->origin;
            $video->status = $request->status;
            $video->is_static = (bool) $request->is_static;
            $video->save();

            return redirect()->back()->with('message', 'La video a bien été mise à jour');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }

    /**
     * [getVimeoImage description]
     * @param  [type] $video_id [description]
     * @return [type]           [description]
     */
    private function getVimeoImage($video_id){
        if (!function_exists('curl_init'))
            return redirect()->back()->with('message', 'CURL is not installed!');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://vimeo.com/api/v2/video/".$video_id.".php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = unserialize(curl_exec($ch));
        $output = $output[0];
        curl_close($ch);
        return $output;
    }

    /**
     * [delete description]
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    public function delete($number)
    {
        Video::where('number', $number)->delete();
        return redirect()->route('videos.index');
    }
}
