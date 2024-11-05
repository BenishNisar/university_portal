<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentsController;
use App\Http\Controllers\AttendenceRecordsController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CloPloMapController;
use App\Http\Controllers\CourseAssignController;
use App\Http\Controllers\CourseLearningController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CreditHoursController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\FacultyTimingsController;
use App\Http\Controllers\GradePerformanceController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProgramLearningController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ScheduleTimingsController;
use App\Http\Controllers\StudentAssessmentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPerformanceTrackingController;
use App\Http\Controllers\StudyMaterialController;
use App\Http\Controllers\StudyMaterialsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewEnrolledController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('welcome');
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});

// Define the login route
Route::get('/login', [AccountController::class, 'accountlogin'])->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');


Route::get('/account/login', [AccountController::class, 'accountlogin'])->name('account.login');
Route::post('/accountlogin/login-store', [AccountController::class, 'accountloginstore'])->name('account.login.store');



// Admin
// Route::get('/',[DashboardController::class,"index"]);
Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
Route::get('/users/add', [UsersController::class, 'add'])->name('admin.users.add');
Route::post('/users/store', [UsersController::class, 'store'])->name('admin.users.store');

Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
Route::delete('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

Route::put('/users/{id}', [UsersController::class, 'update'])->name('admin.users.update');


// Roles

Route::get('/roles',[RolesController::class,"index"])->name('admin.roles.index');
Route::get('/roles/add', [RolesController::class, 'add'])->name('admin.roles.add');
Route::post('/roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
Route::put('/roles/update/{id}', [RolesController::class, 'update'])->name('admin.roles.update');
Route::delete('/roles/destroy/{id}', [RolesController::class, 'destroy'])->name('admin.roles.destroy');




// Route::get('/Teacher',[TeacherController::class,"dashboard"]);
// // Student
// Route::get('/Student',[TeacherController::class,"dashboard"]);



// Department
Route::get('/departments',[DepartmentsController::class,"index"])->name('admin.departments.index');
// Show the form to add a new department
Route::get('/departments/add', [DepartmentsController::class, 'add'])->name('admin.departments.add');

// Store the new department in the database
Route::post('/departments', [DepartmentsController::class, 'store'])->name('admin.departments.store');

// Show the form to edit an existing department
Route::get('/departments/{id}/edit', [DepartmentsController::class, 'edit'])->name('admin.departments.edit');

// Update an existing department
Route::put('/departments/{id}', [DepartmentsController::class, 'update'])->name('admin.departments.update');

// Optional: Delete a department
Route::delete('/departments/{id}', [DepartmentsController::class, 'destroy'])->name('admin.departments.destroy');

// courses
Route::get('/courses',[CoursesController::class,"index"])->name('admin.courses.index');

    Route::get('/courses/add', [CoursesController::class, 'add'])->name('admin.courses.add');
    Route::post('/courses', [CoursesController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/{id}/edit', [CoursesController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/courses/{id}', [CoursesController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])->name('admin.courses.destroy');


// batches
Route::get('/batches', [BatchController::class, 'index'])->name('admin.batches.index');
Route::get('/batches/add', [BatchController::class, 'add'])->name('admin.batches.add');
Route::post('/batches', [BatchController::class, 'store'])->name('admin.batches.store');
Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('admin.batches.edit');
Route::put('/batches/{id}', [BatchController::class, 'update'])->name('admin.batches.update');
Route::delete('/batches/{id}', [BatchController::class, 'destroy'])->name('admin.batches.destroy');


// course_assign

Route::get('course_assign', [CourseAssignController::class, 'index'])->name('admin.course_assign.index');
Route::get('course_assign/add', [CourseAssignController::class, 'add'])->name('admin.course_assign.add');
Route::post('course_assign', [CourseAssignController::class, 'store'])->name('admin.course_assign.store');
Route::get('course_assign/{id}/edit', [CourseAssignController::class, 'edit'])->name('admin.course_assign.edit');
Route::put('course_assign/{id}', [CourseAssignController::class, 'update'])->name('admin.course_assign.update');
Route::delete('course_assign/{id}', [CourseAssignController::class, 'destroy'])->name('admin.course_assign.destroy');


// clo_plo
Route::get('/clo_plo',[CloPloMapController::class,"index"])->name('admin.clo_plo.index');
// program
Route::get('/programlearning',[ProgramLearningController::class,"index"])->name('admin.programlearning.index');
// course
Route::get('/courselearning',[CourseLearningController::class,"index"])->name('admin.courselearning.index');

// assessments
Route::get('/assessments',[AssessmentsController::class,"index"])->name('admin.assessments.index');

Route::get('/student_assessments',[StudentAssessmentsController::class,"index"])->name('admin.student_assessments.index');
Route::get('/notification',[NotificationsController::class,"index"])->name('admin.notification.index');


Route::get('/schedule_timings',[ScheduleTimingsController::class,"index"])->name('admin.schedule_timing.index');

Route::get('/study_material',[StudyMaterialsController::class,"index"])->name('admin.study_material.index');

Route::get('/view_enrolled',[ViewEnrolledController::class,"index"])->name('admin.view_enrolled.index');

Route::get('/student_performance_tracking',[StudentPerformanceTrackingController::class,"index"])->name('admin.student_performance_tracking.index');

Route::get('/attendence_records',[AttendenceRecordsController::class,"index"])->name('admin.attendence_records.index');


Route::get('/exam_schedule',[ExamScheduleController::class,"index"])->name('admin.exam_schedule.index');


Route::get('/manage_exams',[ManageController::class,"index"])->name('admin.manage_exams.index');

// student

Route::get('/faculty_timings',[FacultyTimingsController::class,"index"])->name('admin.faculty_timings.index');


Route::get('/credit_hr',[CreditHoursController::class,"index"])->name('admin.credit_hr.index');



Route::get('/grade_performance',[GradePerformanceController::class,"index"])->name('admin.grade_performance.index');


