<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';
    protected $guarded = ['id'];

    public function scopeLatest($q) {
        return $q->orderBy('id', 'desc');
    }

    public function scopeCanDownload($q) {
        return $q->where('can_download', true);
    }


    public function playlist() {
        return $this->belongsTo(Playlist::class);
    }
}
