<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcoStudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_studies', function (Blueprint $table) {
            $table->integer('eco_study_id')->unsigned();
        });
        Schema::create('eco_studies', function (Blueprint $table) {
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
        Schema::table('document_studies', function (Blueprint $table) {
            $table->dropColumn('eco_study_id');
        });
        Schema::drop('eco_studies');
    }
}
