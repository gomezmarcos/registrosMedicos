<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('names');
            $table->string('lastNames');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('birthDate');
            $table->string('dniType');
            $table->integer('dni');
            $table->string('email1');
            $table->string('email2');
            $table->string('cellPhone1');
            $table->string('cellPhone2');
            $table->string('phone1');
            $table->string('phone2');
            $table->timestamps();
        });

        Schema::create('document_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::drop('profiles');
        Schema::drop('document_profiles');
    }
}
