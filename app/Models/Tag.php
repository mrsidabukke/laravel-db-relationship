<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    //polymorphic relationship one to many , one to one
    // public function tagable()
    // {
    //     return $this->morphTo();
    // }


    //polymorphic relationship many to many
    public function blogs()
    {
        return $this->morphedByMany('App\Models\blog', 'taggable');
    }

    public function courses()
    {
        return $this->morphedByMany('App\Models\course', 'taggable');
    }
}
