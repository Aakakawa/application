<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'article_id',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
    
    //public function getByCategory($category_id,int $limit_count = 5)
    //{
        //return $this::where('id',$category_id)->with('articles')->orderBy('created_at', 'DESC')->paginate($limit_count);
    //}
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->articles()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
