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

$factory->define(\Yasser\LaravelDashboard\Models\Post::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomNumber(0, 50),
        'title' => $faker->text(100),
        'summary' => $faker->text(150),
        'content' => $faker->text(),
        'status' => $faker->randomElement(['publish','draft'])
    ];
});
