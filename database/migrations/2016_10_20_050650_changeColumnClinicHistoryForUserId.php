<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnClinicHistoryForUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->dropForeign('medications_clinichistory_id_foreign');
            $table->dropColumn('clinicHistory_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->integer('clinicHistory_id')->unsigned();
            $table->foreign('clinicHistory_id')->references('id')->on('clinicHistory')->onDelete('cascade');
            $table->dropForeign('medications_user_id_foreign');
            $table->dropColumn('user_id');
            //
        });
    }
}
