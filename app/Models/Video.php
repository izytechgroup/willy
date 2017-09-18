<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $guarded = ['id'];

    public function scopeLatest($q) {
        return $q->orderBy('id', 'desc');
    }

    public function scopeLast($q) {
        return $q->orderBy('id', 'desc')->first();
    }

    public function scopeCanDisplay($q) {
        return $q->where('status', 'published');
    }

    public function scopeDifferent($q, $number) {
        return $q->where('number', '!=', $number);
    }
}
