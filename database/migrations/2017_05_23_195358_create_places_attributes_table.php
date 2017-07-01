<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packges_attributes', function (Blueprint $table) {
            $table->increments('id');
             $table->string('Value');     
             $table->integer('Packge_id')->unsigned();
             $table->integer('attrbuti_id')->unsigned();
            $table->foreign('Packge_id')
              ->references('id')->on('packges')
              ->onDelete('cascade')
              ->onupdate('cascade');
               $table->foreign('attrbuti_id')
              ->references('id')->on('attributes')
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
       Schema::drop('packges_attributes');
    }
}
