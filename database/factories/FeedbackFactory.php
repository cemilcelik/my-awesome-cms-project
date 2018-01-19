<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
        'name_surname'  => $faker->name,
        'email'         => $faker->unique()->safeEmail,
        'message'       => $faker->paragraph
    ];
});
