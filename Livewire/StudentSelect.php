<?php

namespace Modules\UniStudentManagement\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\UniStudentManagement\Models\Student;

class StudentSelect extends Component
{
    use WithPagination;

    public $search = ''; // To capture search query
    public $dataSelected; // To bind the selected value
    public $valueField = 'id';
    public $labelField = 'name';
    public $componentId;


    public function mount($componentId, $dataSelected = null)
    {
        $this->componentId = $componentId;
        $this->dataSelected = $dataSelected;

    }
    public function updatedDataSelected()
    {
        $this->dispatch($this->componentId, $this->dataSelected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $options = Student::query()
            ->when($this->search, function ($query) {
                $query->where($this->labelField, 'like', '%' . $this->search . '%')
                    ->orWhere('student_code', 'like', '%' . $this->search . '%')
                    ->orWhere('father_name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.student-select', compact('options'));
    }

}
