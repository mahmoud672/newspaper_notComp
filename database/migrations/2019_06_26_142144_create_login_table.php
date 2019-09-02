<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration
{

    public function up()
    {
        Schema::create('login',function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->string('user_type');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('login');
    }
}
