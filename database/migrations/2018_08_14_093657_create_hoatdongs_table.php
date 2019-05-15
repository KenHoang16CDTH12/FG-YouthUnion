<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoatdongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoatdongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desc')->nullable();
            $table->date('from_date');
            $table->date('end_date');
            $table->integer('hoatdongtype_id')->unsigned();
            $table->string('image')->nullable()->default('default.png');
            $table->timestamps();
            //FK
            $table->foreign('hoatdongtype_id')->references('id')->on('hoatdong_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoatdongs');
    }
}
