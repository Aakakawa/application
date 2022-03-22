<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
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
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function article()
    {
        return $this->belongsTo('App\article','article_id');
    }
    
    public function Fav_Comments()
    {
        return $this->hasMany('App\Fav_Comment','fav_comment_id');
    }
    
    public function pictures()
    {
        return $this->hasMany('App\picture');
    }
}
