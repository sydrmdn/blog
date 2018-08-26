<?php

use Faker\Generator as Faker;

$factory->define(App\Story::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'body' => $faker->sentence(20),
        'image' => str_random(5),
        'slug' => str_slug($faker->sentence(5))
    ];
});
