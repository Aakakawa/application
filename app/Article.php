<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'body',
        'category_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function fav_articles()
    {
        return $this->hasMany('App\Fav_Article');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function pictures()
    {
        return $this->hasMany('App\ArticlePicture');
    }
    
    public function getByLimit(int $limit_count = 10)
    {
    // created_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('categories')->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    //protected $fillable = [
      //  'body',
    //];
}
