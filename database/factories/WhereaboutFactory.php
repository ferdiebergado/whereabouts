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

$factory->define(App\Whereabout::class, function (Faker\Generator $faker) {
    return [
        'activity' => $faker->text,
        'venue' => $faker->address,
        'sponsor' => $faker->company,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
