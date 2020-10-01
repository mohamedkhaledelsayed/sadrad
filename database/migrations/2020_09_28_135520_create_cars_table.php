<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("image");
            $table->UnsignedBigInteger('type_carid');
            $table->foreign('type_carid')->references('id')->on('types_cars');
            $table->UnsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('brand_car');
            $table->integer('model');
            $table->float('maximum_weight')->nullable();
            $table->integer('number_of_persons')->nullable();
            $table->boolean('Aircondtion')->default(0);
            $table->boolean('status')->default(0);
            $table->string('language');
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
        Schema::dropIfExists('cars');
    }
}
