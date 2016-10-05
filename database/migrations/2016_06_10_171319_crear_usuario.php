<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('document_miscs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('misc_id')->unsigned();
            $table->foreign('misc_id')->references('id')->on('miscs')->onDelete('cascade');
            $table->string('path');
            $table->string('name');
            $table->string('extension');
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
        Schema::drop('document_miscs');
        Schema::drop('miscs');
    }
}
