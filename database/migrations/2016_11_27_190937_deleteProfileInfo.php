<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteProfileInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('profile_infos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('profile_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('bloodType');
            $table->string('allergies');
            $table->string('implants');
            $table->string('vaccines');
            $table->string('antecedentes');
            $table->string('fuma');
            $table->string('bebe');
            $table->string('deporte');
            $table->string('otro');
            $table->timestamps();
        });
    }
}
