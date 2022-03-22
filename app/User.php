<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function articles()
    {
        return $this->hasMany('App\Article','article_id');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment','comment_id');
    }
    
    public function Fav_Articles()
    {
        return $this->hasMany('App\Fav_Article','Fav_Article_id');
    }
    
    public function Fav_Comments()
    {
        return $this->hasMany('Fav_Comment','Fav_comment_id');
    }
}
