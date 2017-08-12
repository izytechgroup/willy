<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';
    protected $guarded = ['id'];

    public function playlist() {
        return $this->belongsTo(Playlist::class);
    }
}
