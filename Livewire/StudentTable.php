<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\WithDataTableFilters;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\UniStudentManagement\Livewire\Student\StudentDetails;
use Modules\UniStudentManagement\Models\Student;
use Modules\UniStudentManagement\Models\UniRegister;

class StudentTable extends Component
{
    use WithPagination, WithDataTableFilters;
    public $for;
    public $majorType;
    public $registerType;
    public $selectedStudents = [];


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

    public function toggleSelectAll()
    {
        $students = Student::all();
        if (count($this->selectedStudents) < count($students)) {
            $this->selectedStudents = $students->pluck('id')->toArray();
        } else {
            $this->selectedStudents = [];
        }
    }


    public function deleteStudent($studentId)
    {
        Student::findOrFail($studentId)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }

    public function bulkDeleteRequest()
    {
        $this->dispatch('bulk-delete-warning');
    }

    public function bulkDelete()
    {
        if (Student::whereIn('id', array_values($this->selectedStudents))->delete()){
            $this->selectedStudents = [];
            $this->dispatch('student-deleted-success');
        }else{
            $this->dispatch('student-deleted-error');
        }

    }

    public function bulkPrint()
    {
        $students = Student::whereIn('id', $this->selectedStudents)->get();
        $html = '';

        $chunkedStudents = $students->chunk(10);
        foreach ($chunkedStudents as $chunk) {
            foreach ($chunk as $student) {
                $universities = $student->uniRegisters()->orderBy('id', 'desc')->get();

                $html .= view('unistudentmanagement::student.print.template2-student-details', [
                    'student' => $student,
                    'universities' => $universities,
                ])->render();
            }
        }

        $this->dispatch('print-table-student-details', $html);
        $this->selectedStudents = [];
    }


    public function printStudent($studentId)
    {
        $student = Student::findOrFail($studentId);
        $universities = $student->uniRegisters()->orderBy('id', 'desc')->get();

        $html = view('unistudentmanagement::student.print.template2-student-details', [
            'student' => $student,
            'universities' => $universities,
        ])->render();
        $this->dispatch('print-table-student-details', $html);
    }

    public function showStudentDetails($studentId)
    {
        $this->dispatch('showStudentDetails', $studentId)->to(StudentDetails::class);
    }

    #[On('student-deleted-success')]
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
            $query = Student::when($this->for == 'major-registration', function ($q) {
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
