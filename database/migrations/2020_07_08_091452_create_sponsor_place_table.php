<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_place', function (Blueprint $table) {
            $table->id();
            // Sponsor foreign key
            $table->unsignedBigInteger('sponsor_id');
            // Place foreign key
            $table->unsignedBigInteger('place_id');
            $table->string('id_transaction');
            $table->dateTime('start');
            $table->dateTime('end');

            /* Sponsors Foreign key reference */
            $table->foreign('sponsor_id')
                    ->references('id')
                    ->on('sponsors')
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
        Schema::dropIfExists('sponsor_place');
    }
}
