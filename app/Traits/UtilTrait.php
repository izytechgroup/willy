<?php
namespace App\Traits;

use App\Functions;
use App\Models\PlayList;
use App\Models\Song;
use Illuminate\Http\Request;

trait UtilTrait
{
    public function makePlaylistNumber()
    {
        if($lastPlayList = PlayList::orderBy('id', 'desc')->first())
        {
            $number = $lastPlayList->number ++;
        }
        else{
            $number  = 101000;
        }
        return $number;
    }

    public function makeSongNumber()
    {
        if($lastSong = $lastSong::orderBy('id', 'desc')->first())
        {
            $number = $lastApp->number ++;
        }
        else{
            $number  = 1010000;
        }
        return $number;
    }
}
