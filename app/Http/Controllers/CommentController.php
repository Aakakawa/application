<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request,Article $article,Comment $comment)
    {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];
        $input += ['article_id' => $article->id];
        $comment->fill($input)->save();
        return redirect('articles/'. $article->id);
    }
}
