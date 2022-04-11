<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        'name' => 'コンシーラー',
        'created_at' => new Datetime(),
        'updated_at' => new Datetime(),
    ]);
        DB::table('categories')->insert([
        'name' => 'ハイライト',
        'created_at' => new Datetime(),
        'updated_at' => new Datetime(),
    ]);
    }
}
