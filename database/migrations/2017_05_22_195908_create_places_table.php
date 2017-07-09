<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('Name', 150);
             $table->string('Address', 32);
             $table->string('Tele',11);
             $table->string('Email', 150)->unique();
             $table->string('Description', 100);
             $table->string('Type', 100);
             $table->integer('IsActive');
               $table->integer('Packge_id')->unsigned();
            $table->foreign('Packge_id')
              ->references('id')->on('packges')
              ->onDelete('cascade')
              ->onupdate('cascade');
             $table->integer('District_Id')->unsigned();
             $table->foreign('District_Id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::drop('places');
    }
}
