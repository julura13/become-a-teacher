<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Course;
use App\CourseCategory;
use App\Pathway;
use App\Requirement;

class FilterTable extends Component
{
    use WithPagination;
    public $per_page = 10;
    public $course = [];

    public function render()
    {
        $courses = Course::all();
        $categories = CourseCategory::all();
        return view('livewire.filter-table', [
            'pathways' => Pathway::simplePaginate($this->per_page),
        ])->with('courses', $courses)->with('categories', $categories);
    }
}
