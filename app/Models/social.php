<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    // use HasFactory;
    public $timestamps = false;

    //cara menghubungkan tabel socials dengan tabel users
    //menggunakan belongsTo karena tabel socials adalah tabel yang memiliki foreign key
    public function user()
{
    return $this->belongsTo('App\Models\User');
}


}


