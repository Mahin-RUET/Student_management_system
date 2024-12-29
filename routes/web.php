<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssaignSubjectToClassController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


Route::group(['prefix' => 'student'], function () {
    //guest
    Route::group(['middleware'=>'guest'],function(){
       Route::get('login',[\App\Http\Controllers\UserController::class,'index'])->name('student.login');
       Route::post('authenticate',[\App\Http\Controllers\UserController::class,'authenticate'])->name('student.authenticate');

    });
    //auth
    Route::group(['middleware'=>'auth'],function(){
       Route::get('dashboard',[\App\Http\Controllers\UserController::class,'dashboard'])->name('student.dashboard');
       Route::get('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('student.logout');
       Route::get('change-password',[\App\Http\Controllers\UserController::class,'changePassword'])->name('student.changePassword');
       Route::post('update-password',[\App\Http\Controllers\UserController::class,'updatePassword'])->name('student.updatePassword');
    });
});






require __DIR__.'/auth.php';
Route::group(['prefix' => 'admin'], function () {
    // Guest Middleware Routes
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [Admincontroller::class, 'index'])->name('admin.login');
        Route::get('register', [Admincontroller::class, 'register'])->name('admin.register');
        Route::post('authenticate', [Admincontroller::class, 'authenticate'])->name('admin.authenticate');
    });

    // Authenticated Middleware Routes
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('logout', [Admincontroller::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [Admincontroller::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [Admincontroller::class, 'form'])->name('admin.form');
        Route::get('table', [Admincontroller::class, 'table'])->name('admin.table');


        Route::get('academic-year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic-year/read', [AcademicYearController::class, 'read'])->name('academic-year.read');
        Route::get('academic-year/delete/{id}', [AcademicYearController::class, 'delete'])->name('academic-year.delete');
        Route::get('academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::post('academic-year/update', [AcademicYearController::class, 'update'])->name('academic-year.update');

        Route::get('announcement/create',[AnnouncementController::class,'index'])->name('announcement.create');
        Route::post('announcement/store',[AnnouncementController::class,'store'])->name('announcement.store');
        Route::get('announcement/read',[AnnouncementController::class,'read'])->name('announcement.read');
        Route::get('announcement/edit/{id}',[AnnouncementController::class,'edit'])->name('announcement.edit');
        Route::post('announcement/update/{id}',[AnnouncementController::class,'update'])->name('announcement.update');
        Route::get('announcement/delete/{id}',[AnnouncementController::class,'delete'])->name('announcement.delete');


        Route::get('subject/create',[SubjectController::class,'index'])->name('subject.create');
        Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('subject/read',[SubjectController::class,'read'])->name('subject.read');
        Route::get('subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
        Route::get('subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::post('subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');

        Route::get('assaign-subject/create',[AssaignSubjectToClassController::class,'index'])->name('assaign-subject.create');




        Route::get('class/create', [\App\Http\Controllers\ClassesController::class, 'index'])->name('class.create');
        Route::post('class/store', [\App\Http\Controllers\ClassesController::class, 'store'])->name('class.store');
        Route::get('class/read', [\App\Http\Controllers\ClassesController::class, 'read'])->name('class.read');
        Route::get('class/edit/{id}', [\App\Http\Controllers\ClassesController::class, 'edit'])->name('class.edit');
        Route::post('class/update', [\App\Http\Controllers\ClassesController::class, 'update'])->name('class.update');
        Route::get('class/delete/{id}', [\App\Http\Controllers\ClassesController::class, 'delete'])->name('class.delete');

        Route::get('fee-head/create', [App\Http\Controllers\FeeHeadController::class, 'index'])->name('fee-head.create');
        Route::post('fee-head/store', [App\Http\Controllers\FeeHeadController::class, 'store'])->name('fee-head.store');
        Route::get('fee-head/read', [\App\Http\Controllers\FeeHeadController::class, 'read'])->name('fee-head.read');
        Route::get('fee-head/edit/{id}', [\App\Http\Controllers\FeeHeadController::class, 'edit'])->name('fee-head.edit');
        Route::post('fee-head/update', [\App\Http\Controllers\FeeHeadController::class, 'update'])->name('fee-head.update');
        Route::get('fee-head/delete/{id}', [\App\Http\Controllers\FeeHeadController::class, 'delete'])->name('fee-head.delete');

        Route::get('fee-structure/create', [App\Http\Controllers\FeeStructureController::class, 'index'])->name('fee-structure.create');
        Route::post('fee-structure/store', [App\Http\Controllers\FeeStructureController::class, 'store'])->name('fee-structure.store');
        Route::get('fee-structure/read', [App\Http\Controllers\FeeStructureController::class, 'read'])->name('fee-structure.read');
        Route::get('fee-structure/delete/{id}', [App\Http\Controllers\FeeStructureController::class, 'delete'])->name('fee-structure.delete');
        Route::get('fee-structure/edit/{id}', [App\Http\Controllers\FeeStructureController::class, 'edit'])->name('fee-structure.edit');
        Route::post('fee-structure/update/{id}', [App\Http\Controllers\FeeStructureController::class, 'update'])->name('fee-structure.update');


       Route::get('student/create', [App\Http\Controllers\StudentController::class, 'index'])->name('student.create');
       Route::post('student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
       Route::get('student/read', [App\Http\Controllers\StudentController::class, 'read'])->name('student.read');

       Route::get('student/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('student.delete');
       Route::get('student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
       Route::post('student/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    });
});
