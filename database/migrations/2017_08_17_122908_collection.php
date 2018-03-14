<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Collection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection', function(Blueprint $table){
            $table->increments('id');
            $table->string('warranty');
            $table->string('weight');
            $table->string('size');
            $table->string('length_of_sheets');
            $table->string('quantity_of_sheets');
            $table->string('quantity_of_boxes');
            $table->string('protrusion');
            $table->string('wind_min');
            $table->string('wind_max');
            $table->string('angle');
            $table->string('description');
            $table->string('description_title');
            $table->string('name');
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
        Schema::dropIfExists('collection');
    }
}
