<?php

namespace Modules\UniStudentManagement\Livewire\University;

use App\MajorType;
use App\Models\Nrc;
use App\UniversityType;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;
use Modules\UniStudentManagement\Models\UniRegister;

class UniRegisterCreateV1 extends Component
{
    public $oldStudentSelect = null;
    public $student_id = null;
    public $uniRecords = [];


    public $location_id, $student_code, $name, $student_nrc_code, $student_nrc_no;
    public $date_of_birth, $grade_10_desk_id, $grade_10_total_mark, $grade_10_passed_year;
    public $father_name, $father_nrc_code, $father_nrc_no, $mother_name, $mother_nrc_code, $mother_nrc_no;
    public $student_phone, $parent_phone, $address, $note, $current_attendance_year, $approval_no;
    public $ar_wa_tha_no, $type, $major, $get_university, $created_by;

    public $nrcs = [];
    public $registerType;
    public $majorType;
    public $uniType;
    public $age;

    public $year_of_attendance, $current_desk_symbol = 'N/A', $current_desk_no;

    public function mount($for = null)
    {
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

    protected $listeners = [
        'studentSelect' => 'handleStudentSelect',
    ];

    public function updatedYearOfAttendance()
    {
        $this->current_desk_symbol = $this->year_of_attendance . '/' . $this->major;
    }

    public function updatedMajor()
    {
        $this->current_desk_symbol = $this->year_of_attendance . '/' . $this->major;
    }

    public function handleStudentSelect($id)
    {
        $this->oldStudentSelect = Student::where('id',$id)->first();

        if ($this->oldStudentSelect){
            $this->name = $this->oldStudentSelect->name;
            $this->student_nrc_code = $this->oldStudentSelect->student_nrc_code;
            $this->student_nrc_no = $this->oldStudentSelect->student_nrc_no;
            $this->date_of_birth = $this->oldStudentSelect->date_of_birth;
            $this->grade_10_desk_id = $this->oldStudentSelect->grade_10_desk_id;
            $this->grade_10_total_mark = $this->oldStudentSelect->grade_10_total_mark;
            $this->grade_10_passed_year = $this->oldStudentSelect->grade_10_passed_year;
            $this->father_name = $this->oldStudentSelect->father_name;
            $this->approval_no = $this->oldStudentSelect->approval_no;
            $this->father_nrc_code = $this->oldStudentSelect->father_nrc_code;
            $this->father_nrc_no = $this->oldStudentSelect->father_nrc_no;
            $this->mother_name = $this->oldStudentSelect->mother_name;
            $this->mother_nrc_code = $this->oldStudentSelect->mother_nrc_code;
            $this->mother_nrc_no = $this->oldStudentSelect->mother_nrc_no;
            $this->student_phone = $this->oldStudentSelect->student_phone;
            $this->parent_phone = $this->oldStudentSelect->parent_phone;
            $this->address = $this->oldStudentSelect->address;
            $this->current_attendance_year = $this->oldStudentSelect->level + 1 ?? 1;
            $this->ar_wa_tha_no = $this->oldStudentSelect->ar_wa_tha_no;
            $this->type = $this->oldStudentSelect->type;
            $this->major = $this->oldStudentSelect->major;
            $this->get_university = $this->oldStudentSelect->get_university;

           $this->uniRecords = UniRegister::where('student_id', $id)->get();
           if ($this->uniRecords->count() > 0) {
               $this->year_of_attendance = $this->uniRecords->sortByDesc('year_of_attendance')->first()->year_of_attendance + 1 ?? 1;
           }else{
                $this->year_of_attendance = 1;
           }

            $this->current_desk_symbol = $this->year_of_attendance . '/' . $this->oldStudentSelect->major;

        }else{
            $this->name = null;
            $this->student_nrc_code = null;
            $this->student_nrc_no = null;
            $this->date_of_birth = null;
            $this->grade_10_desk_id = null;
            $this->grade_10_total_mark = null;
            $this->grade_10_passed_year = null;
            $this->father_name = null;
            $this->approval_no = null;
            $this->father_nrc_code = null;
            $this->father_nrc_no = null;
            $this->mother_name = null;
            $this->mother_nrc_code = null;
            $this->mother_nrc_no = null;
            $this->student_phone = null;
            $this->parent_phone = null;
            $this->address = null;
            $this->current_attendance_year = null;
            $this->type = null;
            $this->major = null;
            $this->get_university = null;

            $this->uniRecords = [];
        }
    }

    public function createStudent()
    {

       if ($this->oldStudentSelect) {
           $student = Student::where('id', $this->oldStudentSelect->id)->update([
               'name' => $this->name,
//            'level' => 0,
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
//            'note' => $this->note,
//            'approval_no' => $this->approval_no,
//            'ar_wa_tha_no' => $this->ar_wa_tha_no,
//            'type' => $this->type,
               'major' => $this->major,
//            'get_university' => $this->get_university,
//            'draft' => false,
               'updated_by' => auth()->id(),
           ]);
           $this->student_id = $this->oldStudentSelect->id;
       }else{
           $usmSettings =  \Modules\UniStudentManagement\Models\UsmSettings::where('key','year_of_record')->first();
           if ($usmSettings == null) {
               $this->reset();
               session()->flash('warning', "ကျေးဇူးပြု၍ data ထည့်သွင်းမည့် ခုနှစ် သက်မှတ်ပေးပါ.");
               return;
           }

           $this->current_attendance_year = $usmSettings->value;

           $this->location_id =  auth()->user()->default_location_id;
           $this->generateStudentCode();
           $student = Student::create([
               'name' => $this->name,
               'student_code' => $this->student_code,
               'location_id' => $this->location_id,
               'level' => $this->current_attendance_year ?? null,
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
               'note' => $this->note ?? null,
               'is_major_registered' => false,
               'current_attendance_year' => $this->current_attendance_year,
               'approval_no' => $this->approval_no,
               'ar_wa_tha_no' => $this->ar_wa_tha_no,
               'type' => 'distance',
               'major' => $this->major,
               'get_university' => $this->get_university,
               'draft' => false,
               'created_by' => auth()->id(),
           ]);
           $this->student_id = $student->id;
       }

        UniRegister::create([
            'student_id' => $this->student_id,
            'year_of_attendance' => $this->year_of_attendance,
            'major' => $this->major,
            'get_university' => $this->get_university,
            'current_desk_symbol' => $this->current_desk_symbol ?? null,
            'current_desk_no' => $this->current_desk_no ?? null,
            'assignment_a'  => $this->assignment_a ?? 0,
            'assignment_b'  => $this->assignment_b ?? 0,
            'is_win' => $this->is_win ?? null,
            'remark' => $this->remark ?? null,
            'draft' => 0,
            'created_by' => auth()->id(),
        ]);

        $this->reset();
        $message = 'ကျောင်းအပ် ထည့်သွင်းခြင်း အောင်မြင်ပါသည်';
        session()->flash('success', $message);
        return $this->redirect('/unistudentmanagement/uni-registration', navigate: false);
    }

    public function generateStudentCode()
    {
        $date = now()->format('Y');
        $latestCode = Student::withTrashed()
            ->latest('id')
            ->value('student_code');

        $lastSerial = 0;
        if ($latestCode) {
            $lastSerial = (int) Str::afterLast($latestCode, '-');
        }

        $newSerial = str_pad($lastSerial + 1, 6, '0', STR_PAD_LEFT);

        $this->student_code = "STU-{$date}-{$newSerial}";
    }

    public function render()
    {
        return view('unistudentmanagement::livewire.university.uni-register-create-v1')->layout('layouts.app');
    }


}
