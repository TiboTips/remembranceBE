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
            $table->string('name');
            $table->string('image-urlImage');
            $table->timestamp('image-dateTaken');
            $table->string('addressStreet');
            $table->string('addressNumber');
            $table->string('addressBus');
            $table->string('zipcode');
            $table->string('town');
            $table->integer('gpsX');
            $table->integer('gpsY');
            $table->string('folderImages');
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
