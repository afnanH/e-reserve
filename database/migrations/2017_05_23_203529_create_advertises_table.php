<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('advertises', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('Image', 150);
             $table->string('Description', 100);
             $table->string('Type', 100);
             $table->integer('IsAdves');
               $table->integer('Place_id')->unsigned();
            $table->foreign('Place_id')
              ->references('id')->on('places')
              ->onDelete('cascade')
              ->onupdate('cascade');
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
        //
    }
}
