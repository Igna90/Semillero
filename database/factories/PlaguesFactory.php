<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plagues;
use Faker\Generator as Faker;

$factory->define(Plagues::class, function (Faker $faker) {
    return [
        'name' =>  $faker->sentence(),
        'img' =>  $faker->sentence(),
    ];
});
