<?php

use Faker\Generator as Faker;

$factory->define(App\Booking::class, function (Faker $faker) {
    return [
        'tour_id' => random_int(1,50),
        'note' => $faker->realText($maxNbChars = 150, $indexSize = 2),
        'depart_at' => $faker->dateTimeThisMonth($min = 'now'),
        'amount' => random_int(1,45),
        'state' => random_int(1,3)
    ];
});
