<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    $type = ['Single', 'Daily', 'Weekly', 'Monthly'];

    return [
        'title' => $faker->text(100),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'user_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
