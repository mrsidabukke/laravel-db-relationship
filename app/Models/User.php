<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //cara menghubungkan tabel users dengan tabel socials
    //menggunakan hasOne karena tabel users adalah tabel yang memiliki foreign key
    public function socials()
    {
        return $this->hasMany('App\Models\social');
    }

    //cara menghubungkan tabel users dengan tabel blogs
    //menggunakan hasMany karena tabel users adalah tabel yang memiliki foreign key
    public function blogs()
    {
        //hasone untuk relasi one to one
        //hasmany untuk relasi one to many
        //belongsto untuk relasi many to one
        //belongstomany untuk relasi many to many
        return $this->hasMany('App\Models\blog');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\course');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\blogcomment');
    }
}
