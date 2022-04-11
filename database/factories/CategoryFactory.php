<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => faker->name(),
        'created_at' => new Datetime(),
        'updated_at' => new Datetime(),
    ];
});
