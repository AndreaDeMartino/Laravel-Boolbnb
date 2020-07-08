<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            // Place foreign key
            $table->unsignedBigInteger('place_id');
            $table->string('guest_name');
            $table->string('mail_address');
            $table->string('subject');
            $table->text('message');
            $table->timestamp('created_at')->useCurrent();

            /* Foreign reference */
            $table->foreign('place_id')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
