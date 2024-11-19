<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class StudentRecord extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {   
        $records = Student::paginate(10);
        return view('livewire.student-record', compact('records'));
    }
}
