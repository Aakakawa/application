<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function Fav_Articles()
    {
        return $this->hasMany('App\Fav_Article');
    }
    
    public function Fav_Comments()
    {
        return $this->hasMany('App\Fav_Comment');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\user','following_user_id','followed_user_id');
    }
    
    public function follows()
    {
        return $this->belongsToMany('App\follow','follow','followed_user_id','following_user_id');
    }
}
