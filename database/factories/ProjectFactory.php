<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->sentence(3),
        'desc' => $faker->paragraph(),
        'deadline' => $faker->dateTimeBetween('now', '+30 days'),
        'active' => $faker->boolean(70)
    ];
});
