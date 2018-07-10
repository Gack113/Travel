<?php

use Illuminate\Database\Seeder;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tour::class, 50)->create()->each(function ($t) {
            $t->tour_detail()->save(factory(App\TourDetail::class)->make());
        });
    }
}
