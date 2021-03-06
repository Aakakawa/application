<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fav_Article extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 'article_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
