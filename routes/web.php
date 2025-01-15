<?php

use Illuminate\Support\Facades\Route;
use Modules\UniStudentManagement\Http\Controllers\UniStudentManagementController;
use Modules\UniStudentManagement\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('unistudentmanagement')->group(function () {

    Route::get('dashboard', [UniStudentManagementController::class, 'dashboard'])->name('unistudentmanagement.dashboard');

    Route::group([], function () {
        Route::resource('students', UniStudentManagementController::class)->names('students');
    });

    Route::get('/student-data/search', [UniStudentManagementController::class, 'searchData'])->name('students.search');
    Route::prefix('major-registration')->name('major-registration.')->group(function () {
        Route::get('/', [UniStudentManagementController::class, 'majorRegistrationIndex'])->name('index');
        Route::get('/create', [UniStudentManagementController::class, 'majorRegistrationCreate'])->name('create');
        Route::get('/{student}/edit', [UniStudentManagementController::class, 'majorRegistrationEdit'])->name('edit');
    });

    Route::prefix('uni-registration')->name('uin-registration.')->group(function () {
        Route::get('/', [UniStudentManagementController::class, 'uniRegistrationIndex'])->name('index');
        Route::get('/create', [UniStudentManagementController::class, 'uniRegistrationCreate'])->name('create');
        Route::get('/{student}/edit', [UniStudentManagementController::class, 'uniRegistrationEdit'])->name('edit');
    });

    Route::get('/students/{student}/print', function ($studentId) {
        $student = Student::findOrFail($studentId);
        return view('unistudentmanagement::student.print.template1-student-details', compact('student'));
    })->name('students.print');


    Route::get('/draft', [UniStudentManagementController::class, 'draftIndex'])->name('students.draft.index');
    Route::get('/draft/{student}/edit', [UniStudentManagementController::class, 'draftEdit'])->name('students.draft.edit');


    Route::get('settings', [UniStudentManagementController::class, 'settings'])->name('settings');

});
