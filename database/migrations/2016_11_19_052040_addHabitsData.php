<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHabitsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_infos', function (Blueprint $table) {
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
        Schema::table('profile_infos', function (Blueprint $table) {
            $table->dropColumn('fuma');
            $table->dropColumn('bebe');
            $table->dropColumn('deporte');
            $table->dropColumn('otro');
            //
        });
    }
}
