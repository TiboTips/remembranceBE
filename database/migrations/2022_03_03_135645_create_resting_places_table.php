<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestingPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resting_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cemeterySection_id');
            $table->string('type');
            $table->string('image-urlImage');
            $table->timestamp('image-dateTaken');
            $table->integer('locator-row');
            $table->integer('locator-locationInRow');
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
        Schema::dropIfExists('resting_places');
    }
}
