<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTimestampDatetimeDeceaseds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deceaseds', function (Blueprint $table) {
            $table->dropColumn('dateOfBirth');
            $table->dropColumn('dateOfDeath');
        });

        Schema::table('deceaseds', function (Blueprint $table) {
            $table->date('dateOfBirth')->nullable();
            $table->date('dateOfDeath')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
