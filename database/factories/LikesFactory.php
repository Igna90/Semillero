<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Likes;
use Faker\Generator as Faker;

$factory->define(Likes::class, function (Faker $faker) {
    return [
         
        'user_id' => \App\User::all()->random()->id,
        'opinion_id' => \App\Opinions::all()->random()->id,
    ];
});
