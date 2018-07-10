<?php

use Faker\Generator as Faker;

$factory->define(App\TourDetail::class, function (Faker $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 5000, $indexSize = 2)
    ];
});
