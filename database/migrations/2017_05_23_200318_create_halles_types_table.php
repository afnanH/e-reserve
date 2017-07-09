<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halles_types', function (Blueprint $table) {
            $table->increments('id');     
             $table->integer('Hall_id')->unsigned();
             $table->integer('Type_id')->unsigned();
            $table->foreign('Hall_id')
              ->references('id')->on('halles')
              ->onDelete('cascade')
              ->onupdate('cascade');
               $table->foreign('Type_id')
              ->references('id')->on('types')
              ->onDelete('cascade')
              ->onupdate('cascade');
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
      Schema::drop('halles_types');
    }
}
