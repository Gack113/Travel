<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id', true)->index();
            $table->string('name');
            $table->string('thumbnail');
            $table->string('hotel');
            $table->string('transportation');
            $table->string('duration');
            $table->float('fare');
            $table->string('schedule');
            $table->integer('booked')->default(0);
            $table->integer('discount')->default(0);
            $table->text('description');
            $table->string('slug')->unique();
            $table->boolean('is_active');

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
        Schema::dropIfExists('tours');
    }
}
