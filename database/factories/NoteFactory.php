<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'note' => $faker->text(200),
        'schedule_id' => $faker->unique()->numberBetween($min = 1, $max = 50)
    ];
});
