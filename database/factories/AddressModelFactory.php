<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Address::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'street'    => $faker->streetName,
        'number'    => $faker->randomNumber(3),
        'city'      => $faker->city,
        'state'     => $faker->stateAbbr,
    ];
});
