<?php

use Illuminate\Database\Seeder;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;


class CommentsTableSeeder extends Seeder
{
    
    public function run()
    {
        factory(App\Comment::class, 3)->create();
    }
}
