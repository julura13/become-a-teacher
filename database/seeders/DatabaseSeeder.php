<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseCategoriesSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(PathwaysSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
