<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogcomment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //cara agar selalu melakukan eager loading 
    protected $with = ['user'];
    public function blog()
    {
        return $this->belongsTo("App\Models\blog");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
