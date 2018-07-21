<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id', true)->index();
            $table->string('title');
            $table->integer('booking_id')->unsigned()->index();
            $table->integer('state');
            $table->timestamps();
        });

        Schema::table('notifications', function ($table) {
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
