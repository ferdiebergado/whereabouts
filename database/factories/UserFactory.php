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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => $faker->password,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'sex' => $faker->randomElement(['M', 'F']),
        'office' => $faker->numberBetween(1, 3),
        'position' => $faker->numberBetween(1, 10),
        'role' => 99,
        'active' => true
    ];
});
