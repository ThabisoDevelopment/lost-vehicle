<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'firstname' => $faker->text(15),
        'lastname' => $faker->text(20)
    ];
});
