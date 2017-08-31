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
            ->paginate(50);

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

            $video = Video::create([
                'title' => $request->title,
                'status' => $request->status,
                'origin' => $request->origin,
                'number' => $number,
                'origin_id' => $request->origin_id,
                'playlist_id' => $request->playlist_id
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

            $video->title = $request->title;
            $video->playlist_id = $request->playlist_id;
            $video->origin_id = $request->origin_id;
            $video->origin = $request->origin;
            $video->status = $request->status;
            $video->save();

            return redirect()->back()->with('message', 'La video a bien été mise à jour');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }
}
