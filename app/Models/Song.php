<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';
    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'number', 'playlist_id', 'link', 'duration',
        'size', 'plays', 'downloads'
    ];
    

    public function playlist() {
        return $this->belongsTo(Playlist::class);
    }
}
