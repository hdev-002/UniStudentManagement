<?php

namespace Modules\UniStudentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\UniStudentManagement\Models\Student;

class UniStudentManagementApiController extends Controller
{
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

        return "STU-{$date}-{$newSerial}";
    }

    public function index(Request $request)
    {

        if (!$request->user()->tokenCan('student:create ')) {
            return response()->json(['message' => 'Forbidden'], 403); // Return a 403 if unauthorized
        }

        // Return all students if the user has the correct ability
        return response()->json(Student::all(), 200);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the student record
        $student = Student::create([
            'name' => $request->name,
            'student_code' => $this->generateStudentCode(),
            "current_attendance_year" => 2024
        ]);

        // Return the created student with a 201 response
        return response()->json($student, 201);
    }


    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student, 200);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->update($request->all());
        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted'], 200);
    }
}
