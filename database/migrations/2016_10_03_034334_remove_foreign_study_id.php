<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignStudyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_studies', function (Blueprint $table) {
            $table->dropForeign('document_studies_study_id_foreign');
            $table->integer('laboratory_study_id')->unsigned();
            $table->dropColumn('study_id');
            // posts_user_id_foreign
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
            $table->foreign('study_id')->references('id')->on('laboratory_studies')->onDelete('cascade');
            $table->dropColumn('laboratory_study_id');
            $table->integer('study_id')->unsigned();
        });
    }
}
