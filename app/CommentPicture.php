<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentPicture extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'image', 'comment_id'
    ];
    
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
