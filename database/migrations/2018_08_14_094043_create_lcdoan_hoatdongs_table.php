<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcdoanHoatdongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lcdoan_hoatdongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lcdoan_id')->unsigned();
            $table->integer('hoatdong_id')->unsigned();
            $table->timestamps();
            //FK
            $table->foreign('lcdoan_id')->references('id')->on('lcdoans')->onDelete('cascade');
            $table->foreign('hoatdong_id')->references('id')->on('hoatdongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lcdoan_hoatdongs');
    }
}
