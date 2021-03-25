<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Opinions;
use Faker\Generator as Faker;

$factory->define(Opinions::class, function (Faker $faker) {
    return [
        'headline' => $faker->sentence(),
        'description' => $faker->sentence(),
        'plague_id' => \App\Plagues::all()->random()->id,
        'num_likes' => $faker->randomDigit(),
    ];
});
