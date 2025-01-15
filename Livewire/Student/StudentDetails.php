<?php

namespace Modules\UniStudentManagement\Livewire\Student;

use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;

class StudentDetails extends Component
{
    public $studentId;
    public $student;
    public $universities;
    public $majorData;

    public function mount($id)
    {
        $this->studentId = $id;
        $this->loadStudent();
        $this->loadUniHistory();
    }


    public function loadStudent()
    {
        $this->student = Student::findOrFail($this->studentId);
    }

    public function loadUniHistory()
    {
        $this->universities = $this->student->uniRegisters()->orderBy('id', 'desc')->get();
    }

    public function printStudent()
    {
        $html = view('unistudentmanagement::student.print.template1-student-details', [
            'student' => $this->student,
            'universities' => $this->universities,
        ])->render();
        $this->dispatch('print-view-student-details', $html);
    }


    public function render()
    {
        return view('unistudentmanagement::livewire.student.student-details');
    }
}
