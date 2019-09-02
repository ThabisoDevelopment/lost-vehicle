<?php

use Faker\Generator as Faker;

$factory->define(App\Vehicle::class, function (Faker $faker) {
    return [
        'brand_id' => 1,
        'name' => 'WRX STI',
        'model' => now(),
        'color' => $faker->text(15),
        'type' => $faker->text(20),
        'registration' => $faker->text(10),
        'car_active' => 1
    ];
});
