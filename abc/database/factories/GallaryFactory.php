<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(640,480),
        'caption' => $faker->sentence(2)
    ];
});
