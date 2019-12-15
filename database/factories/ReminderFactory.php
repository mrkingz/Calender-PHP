<?php

use Faker\Generator as Faker;

$factory->define(App\Reminder::class, function (Faker $faker) {
    return [
        'channel' => $faker->numberBetween($min = 1, $max = 3),
        'reminder_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'reminder_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'schedule_id' => $faker->numberBetween($min = 1, $max = 40),
    ];
});
