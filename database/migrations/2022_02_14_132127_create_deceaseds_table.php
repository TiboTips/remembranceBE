<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeceasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restingPlace_id');
            $table->string('firstName');
            $table->string('firstName2');
            $table->string('firstName3');
            $table->string('lastName');
            $table->string('title');
            $table->boolean('isFullDateOfBirth');
            $table->boolean('isFullDateOfDeath');
            $table->timestamp('dateOfBirth');
            $table->timestamp('dateOfDeath');
            $table->boolean('isMilitary');
            $table->boolean('isStillLivingPartner');
            $table->integer('yearOfBirth');
            $table->integer('yearOfDeath');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deceaseds');
    }
}
