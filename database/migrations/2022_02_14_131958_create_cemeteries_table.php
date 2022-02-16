<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCemeteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cemeteries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');
            $table->string('addressBus');
            $table->integer('addressNumber');
            $table->string('addressStreet');
            $table->string('gpsX');
            $table->string('gpsY');
            $table->string('name');
            $table->string('town');
            $table->integer('zipcode');
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
        Schema::dropIfExists('cemeteries');
    }
}
