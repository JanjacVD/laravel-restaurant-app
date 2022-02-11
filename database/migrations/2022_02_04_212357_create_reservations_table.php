<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('token');
            $table->string('order_number');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('smoke');
            $table->integer('people');
            $table->string('reservation_date');
            $table->string('reservation_time');
            $table->string('cancel_key');
            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
