<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //polymorphic relationship  one to one
    // public function tag()
    // {
    //     return $this->morphOne('App\Models\Tag','tagable');
    // }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
