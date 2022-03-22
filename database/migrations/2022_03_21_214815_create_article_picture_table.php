<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatearticlePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlePictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->image('image')->nullable()->change();
            $table->timestamps();
            $table->integer('article_id')->unsigned();
            $table->integer('comment_id')->unsigned();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articlePictures');
    }
}
