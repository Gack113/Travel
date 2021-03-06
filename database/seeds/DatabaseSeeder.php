<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(TourDetailsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
    }
}
