<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallesFacilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halles_facilites', function (Blueprint $table) {
            $table->increments('id');     
             $table->integer('Hall_id')->unsigned();
             $table->integer('Facility_id')->unsigned();
            $table->foreign('Hall_id')
              ->references('id')->on('halles')
              ->onDelete('cascade')
              ->onupdate('cascade');
               $table->foreign('Facility_id')
              ->references('id')->on('facilites')
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
         Schema::drop('halles_facilites');
    }
}
