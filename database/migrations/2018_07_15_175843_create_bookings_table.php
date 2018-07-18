<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id', true)->index();
            $table->integer('tour_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->string('note')->nullable();
            $table->datetime('depart_at')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('state')->nullable();

            $table->timestamps();
        });

        Schema::table('bookings', function ($table) {
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
