<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHockysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hockys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hocky', 50);
            $table->integer('namhoc_id')->unsigned();
            $table->timestamps();
            //FK
            $table->foreign('namhoc_id')->references('id')->on('namhocs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hockys');
    }
}
