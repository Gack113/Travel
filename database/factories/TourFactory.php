<?php

use Faker\Generator as Faker;

$factory->define(App\Tour::class, function (Faker $faker) {
    return [
        'name' => 'Tour '. $faker->country .' to '. $faker->country,
        'thumbnail' => $faker->imageUrl,
        'hotel' => 'Hotel '. random_int(2,5) .' stars',
        'transportation' => $faker->randomElement(array('Bus', 'Flight')),
        'duration' => random_int(1,14) .' days',
        'fare' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'schedule' => $faker->country .' to '. $faker->country,
        'booked' => random_int(5,140),
        'discount' => random_int(5,50),
        'description' => $faker->text,
        'is_active' => $faker->boolean
    ];
});
