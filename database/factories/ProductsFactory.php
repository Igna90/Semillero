<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' =>  $faker->sentence(),
        'img' =>  $faker->sentence(),
        'how_to_use' =>  $faker->sentence(),
    ];
});
