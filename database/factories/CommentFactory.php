<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(),
        'created_at' => new Datetime(),
        'updated_at' => new Datetime(),
        'article_id' => 1,
        'user_id' => 1,
    ];
});
