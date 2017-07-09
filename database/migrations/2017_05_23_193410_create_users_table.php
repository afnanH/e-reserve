<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('Name', 150);
             $table->string('Username', 32)->unique();
             $table->string('Tele',11);
             $table->string('Email', 150)->unique();
             $table->string('Password', 100);
             $table->string('Type', 100);
             $table->integer('Supervisor')->unsigned()->nullable();
             $table->integer('Place_Id')->unsigned();
             $table->foreign('Place_Id')
                ->references('id')
                ->on('places')
                ->onUpdate('cascade')
                ->onDelete('cascade');
             $table->integer('District_Id')->unsigned();
             $table->foreign('District_Id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
             $table->foreign('Supervisor')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

             $table->softDeletes();
             $table->rememberToken();
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
        Schema::drop('users');
    }
}
