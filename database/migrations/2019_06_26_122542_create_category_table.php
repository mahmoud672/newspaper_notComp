<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCategoryTable extends Migration
{

    public function up()
    {
     Schema::create('category',function(Blueprint $table){
         $table->increments('id');
         $table->string('name');
         $table->integer('manager_id')->unsigned();
         $table->foreign('manager_id')->references('id')->on('editor')->onDelete('cascade');

         $table->timestamps();
     });
    }


    public function down()
    {
        Schema::dropIfExists('category');

    }
}
