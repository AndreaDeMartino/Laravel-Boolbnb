<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            // User foreign key
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->tinyInteger('num_rooms');
            $table->tinyInteger('num_beds');
            $table->tinyInteger('num_baths');
            $table->smallInteger('square_m')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->decimal('lat', 6,4)->nullable();
            $table->decimal('long', 7,4)->nullable();
            $table->string('place_img')->nullable();
            $table->decimal('price', 11, 2);
            $table->boolean('visibility')->default(1);
            $table->string('slug');
            $table->timestamps();

            /* Foreign reference */
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
