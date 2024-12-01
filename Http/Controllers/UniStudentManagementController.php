<?php

namespace Modules\UniStudentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\UniStudentManagement\Models\Student;

class UniStudentManagementController extends Controller
{

    public function dashboard(){
        return view('unistudentmanagement::dashboard');
    }
    public function searchData(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $perPage = 10;

        $query = Student::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('student_code', 'like', '%' . $search . '%')
            ->orWhere('father_name', 'like', '%' . $search . '%');
        }

        $students = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'results' => $students->items(), // List of students
            'pagination' => [
                'more' => $students->hasMorePages() // Whether there are more pages
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unistudentmanagement::index',[
            'navSection' => 'students'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('unistudentmanagement::create',[
            'navSection' => 'students'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('unistudentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('unistudentmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function majorRegistrationIndex()
    {
        return view('unistudentmanagement::majorRegistration.index',[
            'navSection' => 'students'
        ]);
    }

    public function majorRegistrationCreate()
    {
        return view('unistudentmanagement::majorRegistration.create',[
            'navSection' => 'students'
        ]);
    }

    public function majorRegistrationEdit($id)
    {
        return view('unistudentmanagement::majorRegistration.edit', compact('id'));
    }

    public function draftIndex()
    {
        return view('unistudentmanagement::draft');
    }

    public function draftEdit($id)
    {
        return view('unistudentmanagement::draft-edit', compact('id'));
    }

    public function settings()
    {
        return view('unistudentmanagement::settings');
    }

    public function uniRegistrationIndex()
    {
        return view('unistudentmanagement::uniRegistration.index');
    }

    public function uniRegistrationCreate()
    {
        return view('unistudentmanagement::uniRegistration.create');
    }

    public function uniRegistrationEdit($id)
    {
        return view('unistudentmanagement::uniRegistration.edit', compact('id'));
    }
}
