<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervs', function (Blueprint $table) {
             $table->increments('id');
            $table->string('first_name');
             $table->string('last_name');
            $table->string('email')->unique();
             $table->string('password');
               $table->string('unit');
            $table->integer('tests');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervs');
    }
}
