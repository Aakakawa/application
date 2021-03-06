<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fav_Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 'comment_id'
    ];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
