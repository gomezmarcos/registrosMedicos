<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicStudyOtro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_studies', function (Blueprint $table) {
            $table->integer('otro_study_id')->unsigned();
        });
        Schema::create('otro_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('date');
            $table->string('title');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('otro_studies', function (Blueprint $table) {
            $table->dropColumn('otro_study_id');
        });
        Schema::drop('otro_studies');
    }
}
