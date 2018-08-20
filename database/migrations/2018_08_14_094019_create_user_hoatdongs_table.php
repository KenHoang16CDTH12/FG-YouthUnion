<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHoatdongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hoatdongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hoatdong_id')->unsigned();
            $table->string('status', 50);
            $table->timestamps();
            //FK
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_hoatdongs');
    }
}
