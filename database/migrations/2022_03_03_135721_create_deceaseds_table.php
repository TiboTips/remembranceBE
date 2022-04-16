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
            $table->string('title');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('firstName2');
            $table->string('firstName3');
            $table->boolean('isFullDateOfBirth');
            $table->timestamp('dateOfBirth');
            $table->integer('yearOfBirth');
            $table->boolean('isFullDateOfDeath');
            $table->timestamp('dateOfDeath');
            $table->integer('yearOfDeath');
            $table->string('urlInMemoriam');
            $table->boolean('isStillLivingPartner');
            $table->boolean('isMilitary');
            $table->boolean('isIncomplete');
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
