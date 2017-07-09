<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchadulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('schadules', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('Name', 150);
             $table->integer('Price');
             $table->integer('IsEvent');
             $table->date('Date_From');
             $table->date('Date_To');
             $table->string('Notes', 300);
             $table->string('Event_Name',100);
             $table->string('Tele',11);
             $table->integer('Hall_Id')->unsigned();
             $table->integer('User_Id')->unsigned();
             $table->foreign('Hall_Id')
                ->references('id')
                ->on('halles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreign('User_Id')
                ->references('id')
                ->on('users')
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
        Schema::drop('schadules');
    }
}
