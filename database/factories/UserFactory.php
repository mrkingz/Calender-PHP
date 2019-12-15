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

$factory->define(App\User::class, function (Faker $faker) {
    $name = ['kingsley Frank-Demesi', 'Smart Omileye', 'Gabriel Afunso'];
    $email = ['kingsley@gmail.com', 'smartomileye@gmail.com', 'gabrielafunso@gmail.com'];
    $index = $faker->unique()->numberBetween($min = 0, $max = 2);

    return [
        'name' => $name[$index],
        'email' => $email[$index],
        'phone' => $faker->e164PhoneNumber,
        'role' => 1,
        'active' => 2,
        'password' => bcrypt('Password1')
    ];
});
