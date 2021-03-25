<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rid;
use Faker\Generator as Faker;

$factory->define(Rid::class, function (Faker $faker) {
    return [
        'product_id' => \App\Products::all()->random()->id,
        'plague_id' => \App\Plagues::all()->random()->id,
    ];
});
