<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MergeProfileInfoIntoClinicHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_histories', function (Blueprint $table) {
            $table->string('bloodType');
            $table->string('antecedentes');
            $table->string('fuma');
            $table->string('bebe');
            $table->string('deporte');
            $table->string('otro');
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
        Schema::table('clinic_histories', function (Blueprint $table) {
            $table->dropColumn('bloodType');
            $table->dropColumn('antecedentes');
            $table->dropColumn('fuma');
            $table->dropColumn('bebe');
            $table->dropColumn('deporte');
            $table->dropColumn('otro');
            //
        });
    }
}
