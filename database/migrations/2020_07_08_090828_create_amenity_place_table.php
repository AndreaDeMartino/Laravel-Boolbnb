<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_place', function (Blueprint $table) {
            $table->id();
            // Amenity foreign key
            $table->unsignedBigInteger('amenity_id');
            // Place foreign key
            $table->unsignedBigInteger('place_id');

            /* Amenities Foreign key reference */
            $table->foreign('amenity_id')
                    ->references('id')
                    ->on('amenities')
                    ->onDelete('cascade');

            /* Places Foreign key reference */
            $table->foreign('place_id')
                    ->references('id')
                    ->on('places')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenity_place');
    }
}
