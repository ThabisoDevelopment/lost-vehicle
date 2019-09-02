<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'brand_active' => 0
    ];
});
