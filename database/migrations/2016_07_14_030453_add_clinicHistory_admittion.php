<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicHistoryAdmittion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_historys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('diseases');
            $table->string('allergies');
            $table->string('implants');
            $table->string('vaccines');
            $table->timestamps();
        });

        Schema::create('admittions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinicHistory_id')->unsigned();
            $table->foreign('clinicHistory_id')->references('id')->on('clinic_historys');
            $table->string('date');
            $table->string('description');
            $table->timestamps(); 
        });

        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinicHistory_id')->unsigned();
            $table->foreign('clinicHistory_id')->references('id')->on('clinic_historys');
            $table->string('name');
            $table->string('drug');
            $table->string('posology');
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
        Schema::drop('clinic_historys');
        Schema::drop('admittions');
        Schema::drop('medications');
    }
}
