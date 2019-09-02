<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderTable extends Migration
{

    public function up()
    {
        Schema::create('reader',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('job_type');
            $table->string('phone');

            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('reader');
    }
}
