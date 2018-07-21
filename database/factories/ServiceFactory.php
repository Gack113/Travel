<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array('Bus', 'Flight', 'Motobike', 'Twin Bike')),
        'content' => $faker->realText($maxNbChars = 5000, $indexSize = 2)
    ];
});
