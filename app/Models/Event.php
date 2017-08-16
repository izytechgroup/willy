<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';
    protected $fillable = [
        'title', 'slug', 'flyer', 'type', 'country', 'address', 'organiser',
        'phone', 'phone2', 'description', 'last_updated_by', 'status'
    ];

}
