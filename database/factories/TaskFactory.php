<?php

/** @var Factory $factory */
use App\Models\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'due_at' => $faker->dateTime,
        'completed_at' => $faker->dateTime,
    ];
});
