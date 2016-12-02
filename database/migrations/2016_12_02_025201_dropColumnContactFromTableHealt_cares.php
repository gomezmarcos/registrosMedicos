<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnContactFromTableHealtCares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_health_cares', function (Blueprint $table) {
            $table->dropColumn('contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_health_cares', function (Blueprint $table) {
            $table->string('contact');
        });
    }
}
