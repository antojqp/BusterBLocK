<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reserUser');
            $table->foreign('reserUser')->references('id')->on('users');
            $table->unsignedInteger('reserMov');
            $table->foreign('reserMov')->references('id')->on('movies');
            $table->integer('reserStatus');
            $table->integer('reserCode');
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
        Schema::dropIfExists('reserves');
    }
}
