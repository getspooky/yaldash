<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\Yasser\LaravelDashboard\Models\Categories::class, function (Faker $faker) {
    return [
        'categories' => $faker->randomElement(['design','make up','story']),
         'post_id' => $faker->randomNumber(0,50)
    ];
});


