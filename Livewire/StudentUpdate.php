<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\Models\Nrc;
use App\UniversityType;
use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;

class StudentUpdate extends Component
{
    public $student;
    public $id;

    public $nrcs = [];

    public $location_id, $student_code, $name, $student_nrc_code, $student_nrc_no;
    public $date_of_birth, $grade_10_desk_id, $grade_10_total_mark, $grade_10_passed_year;
    public $father_name, $father_nrc_code, $father_nrc_no, $mother_name, $mother_nrc_code, $mother_nrc_no;
    public $student_phone, $parent_phone, $address, $note, $current_attendance_year, $approval_no;
    public $ar_wa_tha_no, $type, $major, $get_university, $created_by;
    public $registerType;
    public $majorType;
    public $uniType;
    public $age;




    protected $rules = [
        'name' => 'required|string',
        'grade_10_total_mark' => 'nullable|numeric|min:240|max:600',
        'grade_10_passed_year' => 'nullable|digits:4|integer|min:1900|max:2100',
    ];

    public function mount($student)
    {
        $this->student = Student::findOrFail($student);
        $this->fill($this->student->toArray());

        $this->nrcs = Nrc::select('name_mm', 'nrc_code','id')->get();
        $this->registerType = [
            ['key' => 'distance', 'value' => 'Distance'],
            ['key' => 'day', 'value' => 'Day'],
            ['key' => 'vip', 'value' => 'VIP'],
        ];
        $this->majorType = collect(MajorType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });
        $this->uniType = collect(UniversityType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });

//        dd($this->get_university);
    }

    public function updateStudent()
    {
        $this->validate();
//        dd($this->date_of_birth);

         Student::where('id', $this->student->id)->update([
                'name' => $this->name,
                'level' => 0,
                'student_nrc_code' => $this->student_nrc_code,
                'student_nrc_no' => $this->student_nrc_no,
                'date_of_birth' => $this->date_of_birth ? \Carbon\Carbon::createFromFormat('d-m-Y', $this->date_of_birth)->format('Y-m-d') : null,
                'grade_10_desk_id' => $this->grade_10_desk_id,
                'grade_10_total_mark' => $this->grade_10_total_mark,
                'grade_10_passed_year' => $this->grade_10_passed_year,
                'father_name' => $this->father_name,
                'father_nrc_code' => $this->father_nrc_code,
                'father_nrc_no' => $this->father_nrc_no,
                'mother_name' => $this->mother_name,
                'mother_nrc_code' => $this->mother_nrc_code,
                'mother_nrc_no' => $this->mother_nrc_no,
                'student_phone' => $this->student_phone,
                'parent_phone' => $this->parent_phone,
                'address' => $this->address,
                'note' => $this->note,
                'is_major_registered' => 1,
                'approval_no' => $this->approval_no,
                'ar_wa_tha_no' => $this->ar_wa_tha_no,
                'type' => $this->type,
                'major' => $this->major,
                'get_university' => $this->get_university,
                'draft' => false,
                'updated_by' => auth()->id(),
            ]
        );

//        $this->reset();
        $message = 'မေဂျာ ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်';
        session()->flash('success', $message);
        return $this->redirect(route('students.show', $this->student->id));

    }

    public function render()
    {
        return view('unistudentmanagement::livewire.student-update')->layout('layouts.app');
    }
}
