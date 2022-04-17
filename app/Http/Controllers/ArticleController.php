<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\ArticlePicture;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return view('articles/index')->with(['articles' => $article->getByLimit()]);
    }
    
    public function show(Article $article,ArticlePicture $articlepicture,Comment $comment)
    {
        $image = $articlepicture->where('article_id',$article->id)->first();
        $comments = $comment->where('article_id',$article->id)->get();
        return view('articles/show')->with(['article' => $article,'image' => $image,'comments' => $comments]);
    }
    
    public function add()
    {
      return view('articles.create');
    }

    
    public function create(Category $category)
    {
        return view('articles/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Article $article, ArticleRequest $request,ArticlePicture $articlepicture)
    {
        $input = $request['article'];
        $input += ['user_id' => $request->user()->id];
        $article->fill($input)->save();
        $article->categories()->attach($request['category_id']);
        
        //s3アップロード開始
        $image = $request->file('image');
        if ($image != null){
            // バケットの`myprefix`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            $input2['image'] = $path;
        }
        $input2['article_id'] = $article->id;
        $articlepicture->fill($input2)->save();
        return redirect('articles/'. $article->id);
    }
    
    public function edit(Article $article)
    {
        return view('articles/edit')->with(['article' => $article]);
    }
    
    public function update(ArticleRequest $request, article $article)
    {
        $input_article = $request['article'];
        $input_article += ['user_id' => $request->user()->id];
        $article->fill($input_article)->save();
        $image = $request->file('image');
        // 現在の画像へのパスをセット
        $articlepicture=ArticlePicture::where('article_id',$article->id)->first();
        $path = $articlepicture->image;
        if (isset($image)) {
            // 現在の画像ファイルの削除
            Storage::disk('s3')->delete($path);
            // 選択された画像ファイルを保存してパスをセット
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        }
        // データベースを更新
        $articlepicture->image=$path;
        $articlepicture->save();
        return redirect('/articles/' . $article->id);
    }
    
    public function delete(Article $article)
    {
        $articlepicture=ArticlePicture::where('article_id',$article->id)->first();
        $path = $articlepicture->image;
        Storage::disk('s3')->delete($path);
        $articlepicture->delete();
        $article->delete();
        return redirect('/');
    }
}
