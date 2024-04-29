<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Course;
use Livewire\WithPagination;

class CoursesTable extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
            return view('livewire.courses-table', [
                'courses' => Course::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->per_page),
            ]);
    }
}
