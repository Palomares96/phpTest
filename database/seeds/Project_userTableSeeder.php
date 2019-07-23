<?php

use App\Project_user;
use Illuminate\Database\Seeder;

class Project_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Project_user::class, 100)->create();
    }
}
