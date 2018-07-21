<?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'booking_id' => random_int(1,50),
        'state' => random_int(0,1)
    ];
});
