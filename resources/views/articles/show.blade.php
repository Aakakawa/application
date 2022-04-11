<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cleans</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            
        </style>
    </head>
    <body>
        <div class="content">
            <div class="content__article">
                <p>{{ $article->body }}</p>    
            </div>
        </div>
        @foreach($article->categories as $category)
        <p>{{ $category->name }}</p>
        @endforeach
        @if($image->image != null)
        <img src="https://cleansarticle.s3.amazonaws.com/{{ $image->image }}">
        @endif
        <p class="edit">[<a href="/articles/{{ $article->id }}/edit">編集する</a>]</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">投稿を削除する</button> 
        </form>
    </body>
</html>
@endsection