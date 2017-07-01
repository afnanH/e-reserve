<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('images', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('Url', 400);
             $table->integer('places_id');
             $table->string('places_type', 100);
             $table->integer('IsImg');
             $table->softDeletes();
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
        Schema::drop('images');
    }
}
