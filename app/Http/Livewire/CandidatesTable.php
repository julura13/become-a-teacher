<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Candidate;
use Livewire\WithPagination;

class CandidatesTable extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
            return view('livewire.candidates-table', [
                'candidates' => Candidate::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->per_page),
            ]);
    }
}
