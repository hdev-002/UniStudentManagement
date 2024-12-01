<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\UniversityType;
use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;
use Modules\UniStudentManagement\Models\UniRegister;

class UniRegisterUpdate extends Component
{
    public $for;
    public $studentId;
    public $majorType;
    public $uniType;
    public $age;
    public $year_of_attendance;
    public $major;
    public $get_university;
    public $current_desk_id;
    public $current_desk_no;
    public $assignment_a;
    public $assignment_b;
    public $is_win;
    public $remark;

    public $selectedStudent;
    public $desk_symbol = "N/A";

    protected $listeners = [
        'studentSelect' => 'handleStudentSelect',
    ];


    public function handleStudentSelect($id)
    {
        $this->studentId = $id;
        $this->selectedStudent = Student::where('id',$this->studentId)->first();
        $this->major = $this->selectedStudent?->major;
        $this->get_university = $this->selectedStudent?->get_university;
        $this->year_of_attendance = $this->selectedStudent?->level + 1 ?? 1;

        $this->desk_symbol = $this->year_of_attendance . '/' . $this->major;

        $checkRegister = UniRegister::where('student_id',$this->studentId)
            ->where('current_attendance_year', 2024)->exists();
        if($checkRegister){
            $this->addError('studentId', 'ဒီကျောင်းသားသည် ယခုနှစ်တွင် ကျောင်းအပ်ထားပါသည်');
        } else {
            $this->resetErrorBag('studentId');
        }
    }

    public function updatedMajor(){
        $this->desk_symbol = $this->year_of_attendance . '/' . $this->major;
    }

    public function mount($id)
    {
        $uniRegister = UniRegister::where('id',$id)->first();

        // Initialize major types and university types
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

        $this->selectedStudent = $uniRegister->student_id;
        $this->major = $uniRegister->major;

    }



    public function createUniRegister()
    {
//        // Ensure necessary properties are set before proceeding
//        if (is_null($this->studentId) || is_null($this->year_of_attendance) || is_null($this->major)) {
//            session()->flash('error', 'Please fill in all required fields.');
//            return;
//        }

        // Create the university register entry
        UniRegister::create([
            'student_id' => $this->studentId,
            'year_of_attendance' => $this->year_of_attendance,
            'major' => $this->major,
            'get_university' => $this->get_university,
            'current_desk_symbol' => $this->desk_symbol,
            'current_desk_no' => $this->current_desk_no,
            'assignment_a' => $this->assignment_a ?? false,
            'assignment_b' => $this->assignment_b ?? false,
            'is_win' => $this->is_win ?? false,
            'remark' => $this->remark,
            'draft' => false, // Save as a finalized entry
            'created_by' => auth()->id(),
        ]);

        $message = 'Uni Register created successfully.';

        $this->reset();
        session()->flash('success', $message);
        return $this->redirect('/unistudentmanagement/uni-registration', navigate: false);
    }

    public function saveAsDraft()
    {
        // Ensure necessary properties are set before proceeding
        if (is_null($this->studentId) || is_null($this->year_of_attendance) || is_null($this->major)) {
            session()->flash('error', 'Please fill in all required fields.');
            return;
        }

        // Save the registration as a draft (draft = true)
        UniRegister::create([
            'student_id' => $this->studentId,
            'year_of_attendance' => $this->year_of_attendance,
            'major' => $this->major,
            'get_university' => $this->get_university,
            'current_desk_id' => $this->current_desk_id,
            'current_desk_no' => $this->current_desk_no,
            'assignment_a' => $this->assignment_a,
            'assignment_b' => $this->assignment_b,
            'is_win' => $this->is_win,
            'remark' => $this->remark,
            'draft' => true, // Mark as draft
            'created_by' => auth()->id(),
        ]);


    }

    public function render()
    {
        return view('unistudentmanagement::livewire.uni-register-update');
    }
}
