<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Course;
use Carbon\Carbon;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Auditing',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '1',
                'course_category_name' => 'Finance',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Management Accounting',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '1',
                'course_category_name' => 'Finance',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Accounting',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '1',
                'course_category_name' => 'Finance',
            ]);
        }
        
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Financial Accounting',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '1',
                'course_category_name' => 'Finance',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Business Management',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '2',
                'course_category_name' => 'Management',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'General Management',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '2',
                'course_category_name' => 'Management',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'HR Management',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '2',
                'course_category_name' => 'Management',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Marketing Management',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '2',
                'course_category_name' => 'Management',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'English',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'isiZulu',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Sesotho',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'South African Sign Language',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'African Literature',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Applied English Language Studies',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Linguistics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Literary Theory',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Communications and Media Studies',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '3',
                'course_category_name' => 'Language Studies and communication',
            ]);
        }   
        
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Mathematics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '4',
                'course_category_name' => 'Mathematics',
            ]);
        } 
        
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Physics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Chemistry',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Ecology/Environmental Sciences',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Biochemistry',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Biological Sciences',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Botany',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Genetics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Microbiology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Physiology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Zoology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '5',
                'course_category_name' => 'Natural Sciences',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Psychology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Law/ Human Rights',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Religious Studies',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Human Movement Studies/ Physical Education',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Philosophy',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Sociology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Politics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Anthropology',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Social Work',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '6',
                'course_category_name' => 'Life Orientation',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'History',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '7',
                'course_category_name' => 'Social Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Geography',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '7',
                'course_category_name' => 'Social Sciences',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Economics',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '8',
                'course_category_name' => 'Economics',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Speech Training and Dramatic Art (Speech and Drama, Drama and Dramatic Art, Drama)',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '9',
                'course_category_name' => 'Dramatic Arts',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Applied Drama and Theatre',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '9',
                'course_category_name' => 'Dramatic Arts',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Design',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '10',
                'course_category_name' => 'Visual Arts',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Fine Arts',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '10',
                'course_category_name' => 'Visual Arts',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Art Practical',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '10',
                'course_category_name' => 'Visual Arts',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Graphic Art',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '10',
                'course_category_name' => 'Visual Arts',
            ]);
        }

        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Harmony',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '11',
                'course_category_name' => 'Music',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Musical Form',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '11',
                'course_category_name' => 'Music',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Music in History and Society',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '11',
                'course_category_name' => 'Music',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Course::create([
                'name' => 'Music Practical',
                'level' => $i,
                'description' => 'Some description',
                'course_category_id' => '11',
                'course_category_name' => 'Music',
            ]);
        }

    }
}
