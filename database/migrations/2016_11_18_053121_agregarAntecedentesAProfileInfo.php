<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarAntecedentesAProfileInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_infos', function (Blueprint $table) {
            $table->string('antecedentes');
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
        Schema::table('profile_infos', function (Blueprint $table) {
            $table->dropColumn('antecedentes');
            //
        });
    }
}
