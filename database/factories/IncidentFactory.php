<?php

use Faker\Generator as Faker;

$factory->define(App\Incident::class, function (Faker $faker) {
    return [
        'client_id' => 1,
        'vehicle_id' => 1,
        'brand_id' => 1,
        'case_active' => 1,
        'is_collected' => 1,
        'is_found' => 1
    ];
});
