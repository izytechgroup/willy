<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';
    protected $guarded = ['id'];
    protected $dates = ['date'];


    public function scopeCanDisplay($q) {
        return $q->where('status', 'published');
    }

    public function frenchDate() {
        return strftime("%d %B %Y", strtotime($this->date));
    }

    public function mdFlyer() {
        return str_replace('/images/flyers/', '/md/flyers/', $this->flyer);
    }

    public function smFlyer() {
        return str_replace('/images/flyers/', '/sm/flyers/', $this->flyer);
    }

    public function phones () {
        if ($this->phone2)
        return $this->phone . ' - ' . $this->phone2;
        return $this->phone;
    }

}
