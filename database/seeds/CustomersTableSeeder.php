<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 50)->create()->each(function ($t) {
            $t->bookings()->save(factory(App\Booking::class)->make());
        });
    }
}
