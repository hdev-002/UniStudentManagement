<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\WithDataTableFilters;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\UniStudentManagement\Models\Student;
use Modules\UniStudentManagement\Models\UniRegister;

class StudentTable extends Component
{
    use WithPagination, WithDataTableFilters;
    public $for;
    public $majorType;
    public $registerType;

    protected $listeners = ['studentCreated' => '$refresh', 'studentUpdated' => '$refresh'];



    public function mount($for = null)
    {
        $this->for = $for;
        $this->majorType = collect(MajorType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });

        $this->registerType = collect(MajorType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });

    }

    public function deleteStudent($studentId)
    {
        Student::findOrFail($studentId)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }

    public function render()
    {
        if ($this->for == "uni-registration") {
            $data = UniRegister::leftJoin('students', 'students.id', '=', 'uni_registers.student_id')
            ->select('uni_registers.*',
                'students.name',
                'students.student_code',
                'students.father_name',
                'students.mother_name',);
            $searchableColumns = [];
            $filterableColumns = [];
//            $data = $this->applySearchAndFilters($query, $searchableColumns, $filterableColumns);
        }else{
            $query = Student::filterByYear(2024)->when($this->for == 'major-registration', function ($q) {
                $q->where('is_major_registered', true)->where('draft', false);
            })
                ->when($this->for != 'major-registration' && $this->for != 'draft', function ($q) {
                    $q->with(['studentNRC', 'fatherNRC', 'motherNRC'])->where('draft', false);
                })->when($this->for == 'draft', function ($q) {
                    $q->with(['studentNRC', 'fatherNRC', 'motherNRC'])->where('draft', true);
                });

            $searchableColumns = ['name','student_code'];

            if ($this->for == 'major-registration'){
                $filterableColumns = ['type'];
            }else{
                $filterableColumns = [];
            }


            $data = $this->applySearchAndFilters($query, $searchableColumns, $filterableColumns);
        }

        if ($this->perPage === 'All'){
            $students = $data->get();
        }else{
            $students = $data->paginate($this->perPage);
        }


        return view('unistudentmanagement::livewire.student-table', [
            'students' => $students,
        ]);
    }
}
