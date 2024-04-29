<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\CourseCategory;

class CourseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseCategory::create([
            'name' => 'Accounting'
        ]);
        CourseCategory::create([
            'name' => 'Business Studies'
        ]);
        CourseCategory::create([
            'name' => 'Language Studies and communication'
        ]);
        CourseCategory::create([
            'name' => 'Mathematics'
        ]);
        CourseCategory::create([
            'name' => 'Natural Sciences'
        ]);
        CourseCategory::create([
            'name' => 'Life Orientation'
        ]);
        CourseCategory::create([
            'name' => 'Social Sciences'
        ]);
        CourseCategory::create([
            'name' => 'Economics'
        ]);
        CourseCategory::create([
            'name' => 'Dramatic Arts'
        ]);
        CourseCategory::create([
            'name' => 'Visual Arts'
        ]);
        CourseCategory::create([
            'name' => 'Music'
        ]);
    }
}
