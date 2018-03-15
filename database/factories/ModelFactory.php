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

$factory->define(App\Models\collection::class, function (Faker\Generator $faker) {

    return [
        'warranty' => $faker->sentence(2),
        'weight' => $faker->sentence(2),
        'size' => $faker->sentence(2),
        'length_of_sheets' => $faker->sentence(2),
        'quantity_of_sheets' => $faker->sentence(2),
        'quantity_of_boxes' => $faker->sentence(2),
        'protrusion' => $faker->sentence(2),
        'wind_min' => $faker->sentence(2),
        'wind_max' => $faker->sentence(2),
        'angle' => $faker->sentence(2),
        'description' => $faker->sentence(2),
        'description_title' => $faker->sentence(2),
        'name' => $faker->sentence(2)
    ];
});