<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentsController;
use App\Http\Controllers\AttendenceRecordsController;
use App\Http\Controllers\CloPloMapController;
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
// courses
Route::get('/courses',[CoursesController::class,"index"])->name('admin.courses.index');
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


