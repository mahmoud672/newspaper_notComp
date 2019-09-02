<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderNewsTable extends Migration
{

    public function up()
    {
        Schema::create('reader_news',function(Blueprint $table){
            $table->integer('reader_id')->unsigned();
            $table->integer('news_id')->unsigned();
            $table->integer('reading_times');

            $table->foreign('reader_id')->references('id')->on('reader')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

            $table->primary(['reader_id','news_id']);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reader_news');
    }
}
