<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTableForClinicHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('clinic_historys', function (Blueprint $table) {
            //$table->dropForeign('clinic_historys_user_id_foreign');
        //});
        //Schema::drop('clinic_historys');

        Schema::create('clinic_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('diseases');
            $table->string('allergies');
            $table->string('implants');
            $table->string('vaccines');
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
        Schema::drop('clinic_histories');
        /*Schema::create('clinic_historys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('diseases');
            $table->string('allergies');
            $table->string('implants');
            $table->string('vaccines');
            $table->timestamps();

        });*/
    }
}
