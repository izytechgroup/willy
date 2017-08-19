<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    protected $guarded = ['id'];

    public function songs () {
        return $this->hasMany(Song::class, 'playlist_id');
    }

    public function videos () {
        return $this->hasMany(Video::class, 'playlist_id');
    }
}