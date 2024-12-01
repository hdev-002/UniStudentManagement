<?php

namespace Modules\UniStudentManagement\Livewire;

use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;
use Modules\UniStudentManagement\Models\UniRegister;

class QuickSearchStudent extends Component
{
    public $search = '';
    public $results = [];
    public $selectedResult = null;


    public function updatedSearch($value)
    {
//        dd($value);
        $this->results = Student::query()->where('name', 'like', '%' . $value . '%')
                ->orWhere('student_code', 'like', '%' . $value . '%')
                ->orWhere('father_name', 'like', '%' . $value . '%')
                ->take(10) // Limit the number of results
                ->get();

    }

    public function selectFirstResult()
    {
        if (!empty($this->results)) {
            $this->selectedResult = $this->results->first();

            // Example action: emit event for parent component or process selected data
            $this->dispatch('resultSelected', $this->selectedResult);


            UniRegister::create([
                'student_id' => $this->selectedResult->id,
                'year_of_attendance' => 1,
                'major' => $this->selectedResult->major,
                'get_university' => $this->selectedResult->get_university,
//                'current_desk_symbol' => $this->desk_symbol,
//                'current_desk_no' => $this->current_desk_no,
                'assignment_a' => $this->assignment_a ?? false,
                'assignment_b' => $this->assignment_b ?? false,
                'is_win' => $this->is_win ?? false,
//                'remark' => $this->remark,
                'draft' => false,
                'created_by' => auth()->id(),
            ]);


            $message = 'Uni Register created successfully.';

            $this->reset();
            $this->dispatch('success', $message);
//            session()->flash('success', $message);
        }
    }
    public function render()
    {
        return view('livewire.quick-search-student');
    }
}
