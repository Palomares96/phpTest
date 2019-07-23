<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project_user;
use App\User;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project_user::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    $project = Project::inRandomOrder()->first();
    return [
        //
        'user_id' => $user->id,
        'project_id' => $project->id,
        'active' => $faker->boolean(80)
    ];
});
