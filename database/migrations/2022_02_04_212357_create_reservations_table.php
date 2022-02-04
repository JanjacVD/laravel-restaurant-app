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

            $table->string('order_number');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('smoke');
            $table->integer('people');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->string('cancel_key');
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