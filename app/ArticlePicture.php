<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticlePicture extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'image', 'article_id'
    ];
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
