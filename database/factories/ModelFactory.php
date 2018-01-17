<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;
    [$name, $surname] = explode(' ', $faker->name);

    return [
        'name'      => $name,
        'surname'   => $surname,
        'email'     => $faker->unique()->safeEmail,
        'password'  => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'datetime'  => $faker->dateTime(),
        'active'    => rand(0,1)
    ];
});

$factory->define(App\Media::class, function (Faker\Generator $faker) {
    return [
        'filename'  => 'media\\' . $faker->image('public\storage\media', 640, 480, null, false),
        'ext'       => 'jpg',
        'type'      => 'image',
        'active'    => 1
    ];
});
