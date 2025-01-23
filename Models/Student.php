<?php

namespace Modules\UniStudentManagement\Models;

use App\Models\BusinessLocation;
use App\Models\Nrc;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'location_id',
        'student_code',
        'name',
        'level',
        'student_nrc_code',
        'student_nrc_no',
        'date_of_birth',
        'grade_10_desk_id',
        'grade_10_total_mark',
        'grade_10_passed_year',
        'father_name',
        'father_nrc_code',
        'father_nrc_no',
        'mother_name',
        'mother_nrc_code',
        'mother_nrc_no',
        'student_phone',
        'parent_phone',
        'address',
        'note',
        'is_major_registered',
        'current_attendance_year',
        'approval_no',
        'ar_wa_tha_no',
        'type',
        'major',
        'get_university',
        'draft',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected function dateOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value
                ? \Carbon\Carbon::parse($value)->format('d-m-Y')
                : null,
            set: fn($value) => $value && \Carbon\Carbon::hasFormat($value, 'd-m-Y')
                ? \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d')
                : null,
        );
    }

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


    /**
     * Scope to filter students by attendance year.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|string $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByYear($query, $year)
    {
        return $query->where('current_attendance_year', $year);
    }


    /**
     * Relationship to the Business Location.
     */
    public function businessLocation()
    {
        return $this->belongsTo(BusinessLocation::class);
    }

    /**
     * Scope to filter by grade.
     */
    public function scopeByGrade($query, $grade)
    {
        return $query->where('grade_10_total_mark', '>=', $grade);
    }

    // Relationship with NRC table for student NRC
    public function studentNRC()
    {
        return $this->belongsTo(Nrc::class, 'student_nrc_code', 'id');
    }

    // Relationship with NRC table for father's NRC
    public function fatherNRC()
    {
        return $this->belongsTo(Nrc::class, 'father_nrc_code', 'id');
    }

    // Relationship with NRC table for mother's NRC
    public function motherNRC()
    {
        return $this->belongsTo(Nrc::class, 'mother_nrc_code', 'id');
    }

    public function uniRegisters()
    {
        return $this->hasMany(UniRegister::class);
    }
}
