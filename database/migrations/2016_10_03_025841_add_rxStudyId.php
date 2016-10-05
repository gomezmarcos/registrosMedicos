<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRxStudyId extends Migration
{
    /**
     * Run the migrations.

     TODO review Aca algo no funcion'o, lo importante es 
     que la columna rx_study_id se agregue y no como FK
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_studies', function (Blueprint $table) {
            // $table->integer('rx_study_id')->unsigned();
            // $table->foreign('rx_study_id')->references('id')->on('rx_studies')->onDelete('cascade');
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
            // $table->dropForeign('rx_study_id');
            // $table->dropColumn('rx_study_id');
        });
    }
}
