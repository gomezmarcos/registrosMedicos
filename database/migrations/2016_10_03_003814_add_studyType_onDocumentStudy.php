<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudyTypeOnDocumentStudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_studies', function (Blueprint $table) {
            $table->string('study_type');
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
            $table->dropColumn('study_type');
            //
        });
    }
}
