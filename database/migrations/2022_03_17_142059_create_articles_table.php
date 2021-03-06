<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
