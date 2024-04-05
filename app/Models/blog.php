<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    // protected $table = "blog_comments";
    protected $guarded = ['id'];
    //cara agar selalu melakukan eager loading
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function comments()
    {
        return $this->hasMany('App\Models\blogcomment')->orderBy('created_at', 'desc');
    }

    //polymorphic relationship one to many

    // public function tags()
    // {
    //     return $this->morphMany('App\Models\Tag', 'taggable');
    // }

    //polymorphic relationship many to many
    //('app\Models\Tag' sebagai pathnya, 'taggable' nama tabelnya)
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
