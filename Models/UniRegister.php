<?php

namespace Modules\UniStudentManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

// use Modules\UniStudentManagement\Database\Factories\UniRegisterFactory;

class UniRegister extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'year_of_attendance',
        'major',
        'get_university',
        'current_desk_symbol',
        'current_desk_no',
        'assignment_a',
        'assignment_b',
        'is_win',
        'remark',
        'draft',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected static function booted()
    {
        // Fetch the `year_of_record` value from settings
        $yearOfRecord = cache()->remember('year_of_record', now()->addMinutes(60), function () {
            return \Modules\UniStudentManagement\Models\UsmSettings::where('key', 'year_of_record')->value('value');
        });
        if (!$yearOfRecord) {
            // Log or alert an issue
            Log::warning('The year_of_record setting is missing. Please ensure it is set.');
            session()->flash('warning', 'Some setting is missing. Go App Settings(USM) > Year of Record.');
        }

        static::creating(function ($student) use ($yearOfRecord) {
            // Set the current attendance year only if the `year_of_record` exists
            if ($yearOfRecord) {
                $student->current_attendance_year = $yearOfRecord;
            }
        });

        static::updating(function ($student) use ($yearOfRecord) {
            // Set the current attendance year only if it's not already set and `year_of_record` exists
            if (!$student->current_attendance_year && $yearOfRecord) {
                $student->current_attendance_year = $yearOfRecord;
            }
        });
    }

    public function scopeFilterByYear($query, $year)
    {
        return $query->where('current_attendance_year', $year);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
