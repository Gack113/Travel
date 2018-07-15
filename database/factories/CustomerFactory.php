<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $name.'@'.$faker->freeEmailDomain
    ];
});
