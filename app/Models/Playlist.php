<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'number', 'type', 'status', 'cover'
    ];


    public function scopeAudio($q) {
        return $q->where('type', '=', 'audio');
    }

    public function scopeLatest($q) {
        return $q->orderBy('id', 'desc');
    }

    public function scopeCanDisplay($q) {
        return $q->where('status', 'published');
    }

    public function songs () {
        return $this->hasMany(Song::class, 'playlist_id');
    }

    public function videos () {
        return $this->hasMany(Video::class, 'playlist_id');
    }

    public function mdCover() {
        return str_replace('/images//', '/md//', $this->flyer);
    }
}
