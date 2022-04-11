<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'body', 'user_id', 'article_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
    
    public function Fav_Comments()
    {
        return $this->hasMany('App\Fav_Comment');
    }
    
    public function pictures()
    {
        return $this->hasMany('App\CommentPicture');
    }
}
