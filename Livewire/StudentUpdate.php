<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\Models\Nrc;
use App\UniversityType;
use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;

class StudentUpdate extends Component
{
    public $id;
    public $student;
    public $originalData = [];
    public $editableData = [];
    public $registerType;
    public $majorType;
    public $uniType;
    public $nrcs;
    public $for;
    public $age;
    public $saved = false;
    public $is_major_registered;

    public $business_location_id, $student_code, $name, $student_nrc_code, $student_nrc_no;
    public $date_of_birth, $grade_10_desk_id, $grade_10_total_mark, $grade_10_passed_year;
    public $father_name, $father_nrc_code, $father_nrc_no, $mother_name, $mother_nrc_code, $mother_nrc_no;
    public $student_phone, $parent_phone, $address, $note, $current_attendance_year, $approval_no;
    public $ar_wa_tha_no, $type, $major, $get_university, $updated_by;



//    public function loadStudent($studentId)
//    {
//        $this->student = Student::findOrFail($studentId);
//        $this->fill($this->student->toArray());
//
//
//    }

    public function updating($property, $value){
//        dd($property, $valueue);

//        dd($property, $value);
//        if ($property == 'student_nrc_no'){
//            $this->student_nrc_no = 5;
//        }
    }

    public function mount($id, $for)
    {
        $this->id = $id;
        $this->student = Student::find($id);
        $this->fill($this->student->toArray());
        $this->originalData = $this->student->toArray();
        $this->editableData = $this->originalData;
        //
        $this->for = $for;
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
    }

    public function updatedDateOfBirth()
    {
        $this->validateOnly('date_of_birth', [
            'date_of_birth' => [
                'required',
                'regex:/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/', // Validates DD-MM-YYYY format
                function ($attribute, $value, $fail) {
                    // Convert the value into day, month, year
                    [$day, $month, $year] = explode('-', $value);

                    // Validate if it's a real date
                    if (!checkdate($month, $day, $year)) {
                        $fail('The date of birth must be a valid date.');
                        return;
                    }

                    // Check if the person is at least 15 years old
                    $dob = \Carbon\Carbon::createFromFormat('d-m-Y', $value);
                    $minDate = now()->subYears(15);
                    $this->age = $dob->age;

                    if ($dob->greaterThan($minDate)) {
                        $fail('You must be at least 15 years old.');
                    }
                },
            ],
        ]);

        $this->saveAsDraft();
    }
    protected $listeners = [
        'studentNrcSelect' => 'handleStudentNrcSelected',
        'fatherNrcSelect' => 'handleFatherNrcSelected',
        'motherNrcSelect' => 'handleMotherNrcSelected',
        'registerTypeSelect' => 'handleRegisterTypeSelected',
        'majorTypeSelect' => 'handleMajorTypeSelected',
        'uniTypeSelect' => 'handleUniTypeSelected',
    ];

    public function handleStudentNrcSelected($nrcData)
    {
        $this->student_nrc_code = $nrcData;
    }

    public function handleFatherNrcSelected($nrcData)
    {
        $this->father_nrc_code = $nrcData;
    }

    public function handleMotherNrcSelected($nrcData)
    {
        $this->mother_nrc_code = $nrcData;
    }

    public function handleRegisterTypeSelected($data){
        $this->type = $data;
    }

    public function handleMajorTypeSelected($data){
        $this->major = $data;
    }

    public function handleUniTypeSelected($data){
        $this->get_university = $data;
    }


    public function saveAsDraft()
    {
        $this->saved = false;
        if ($this->name !== null) {

            // Ensure student_code is generated before saving
            if (!$this->student_code) {
                $this->generateStudentCode();  // Generate the student code if not already set
            }

            // Save as draft
            Student::updateOrCreate(
                ['student_code' => $this->student_code],  // Ensure student_code is set
                [
                    'name' => $this->name,
                    'student_code' => $this->student_code,
                    'student_nrc_code' => $this->student_nrc_code,
                    'student_nrc_no' => $this->student_nrc_no,
                    'date_of_birth' => $this->date_of_birth,
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
                    'is_major_registered' => $this->for == "major-registration" ? 1 : $this->is_major_registered ?? 0,
                    'current_attendance_year' => $this->current_attendance_year,
                    'approval_no' => $this->approval_no,
                    'ar_wa_tha_no' => $this->ar_wa_tha_no,
                    'type' => $this->type,
                    'major' => $this->major,
                    'get_university' => $this->get_university,
                    'draft' => true,
                    'created_by' => auth()->id(),
                ]
            );

            $this->saved = true;

        }

    }

    public function discardChanges()
    {
        // Rollback to the original data
        $this->editableData = $this->originalData;
        $this->student->update($this->originalData);
        $this->reset();
        return redirect()->to('/unistudentmanagement/major-registration');
    }

    public function updateStudent()
    {
//        $this->validate();

        $this->student->update([
            'business_location_id' => $this->business_location_id,
            'student_code' => $this->student_code,
            'name' => $this->name,
            'student_nrc_code' => $this->student_nrc_code,
            'student_nrc_no' => $this->student_nrc_no,
            'date_of_birth' => $this->date_of_birth,
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
            'is_major_registered' => $this->for == "major-registration" ? 1 : $this->is_major_registered ?? 0,
            'current_attendance_year' => $this->current_attendance_year,
            'approval_no' => $this->approval_no,
            'ar_wa_tha_no' => $this->ar_wa_tha_no,
            'type' => $this->type,
            'major' => $this->major,
            'draft' => false,
            'get_university' => $this->get_university,
            'updated_by' => auth()->id(),
        ]);

        $message = $this->for == "major-registration" ? 'Major updated successfully.' : 'Student updated successfully.';

        $this->reset();
        session()->flash('success', $message);
        return redirect()->to('/unistudentmanagement/major-registration');
    }

    public function render()
    {
        return view('unistudentmanagement::livewire.student-update');
    }
}
