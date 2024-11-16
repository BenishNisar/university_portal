<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentsController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\AssignmentSubmissionController;
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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramLearningController;
use App\Http\Controllers\QuizBankQuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ScheduleTimingsController;
use App\Http\Controllers\StudentAssessmentsController;
use App\Http\Controllers\StudentAssignmentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentPerformanceTrackingController;
use App\Http\Controllers\StudyMaterialController;
use App\Http\Controllers\StudyMaterialsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewEnrolledController;
use App\Http\Controllers\ViewQuizesController;
use App\Models\StudentCourse;
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
// profile
// In web.php
Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');


// students_courses
  // Show all student courses
  Route::get('/student/courses', [StudentCourseController::class, 'index'])->name('admin.student_courses.index');

  // Show the form to add a new course
  Route::get('/student/courses/add', [StudentCourseController::class, 'add'])->name('admin.student_courses.add');

  // Store a new course
  Route::post('/student/courses', [StudentCourseController::class, 'store'])->name('admin.student_courses.store');

  // Show the form to edit an existing course
  Route::get('/student/courses/{course_id}/edit', [StudentCourseController::class, 'edit'])->name('admin.student_courses.edit');

  // Update an existing course
  Route::put('/student/courses/{course_id}', [StudentCourseController::class, 'update'])->name('admin.student_courses.update');

  // Delete a course
  Route::delete('/student/courses/{course_id}', [StudentCourseController::class, 'destroy'])->name('admin.student_courses.destroy');

// assignments
Route::get('assignments', [AssignmentController::class, 'index'])->name('admin.assignments.index');

// Show the form to create a new assignment
Route::get('assignments/add', [AssignmentController::class, 'add'])->name('admin.assignments.add');

// Store a new assignment
Route::post('assignments', [AssignmentController::class, 'store'])->name('admin.assignments.store');

// Show the form to edit an existing assignment
Route::get('assignments/{id}/edit', [AssignmentController::class, 'edit'])->name('admin.assignments.edit');

// Update an existing assignment
Route::put('assignments/{id}', [AssignmentController::class, 'update'])->name('admin.assignments.update');

// Delete an assignment
Route::delete('assignments/{id}', [AssignmentController::class, 'destroy'])->name('admin.assignments.destroy');



// quizess
    // Display all quizzes
    Route::get('/quizzes', [QuizController::class, 'index'])->name('admin.quizzes.index');

    // Create a new quiz
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'store'])->name('admin.quizzes.store');

    // Edit an existing quiz
    Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])->name('admin.quizzes.edit');
    Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');

    // Delete a quiz
    Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('admin.quizzes.destroy');

    // Add questions to a quiz
    Route::get('/quizzes/{id}/questions/create', [QuizController::class, 'addQuestions'])->name('admin.quizzes.addQuestions');
    Route::post('/quizzes/{id}/questions', [QuizController::class, 'storeQuestions'])->name('admin.quizzes.storeQuestions');

    Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('admin.quizzes.show');
    Route::post('/quizzes/{id}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    Route::post('/quizzes/{id}/submit', [QuizController::class, 'submitQuiz'])->name('quizzes.submit');
    Route::get('/quizzes/{quizId}/result', [QuizController::class, 'result'])->name('quizzes.result');




    // batch
    // In routes/web.php
Route::get('/dashboard/select-batch', [StudentController::class, 'selectBatch'])->name('dashboard.selectBatch');
Route::post('/dashboard/show-quiz', [StudentController::class, 'showQuiz'])->name('dashboard.showQuiz');
Route::get('student/quizzes/{id}', [StudentController::class, 'show'])->name('student.quizzes.show');
Route::get('/student/assignment', [StudentController::class, 'showAssignments'])->name('student.assignment');





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




Route::get('/student/{userId}/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
//asignmentorquiz

Route::get('/teacher/assignmentes', [AssignmentsController::class, 'index'])->name('teacher.assignmentes.index');
Route::get('/teacher/quizzes', [QuizsController::class, 'index'])->name('teacher.quizzes.index');
Route::post('/courses/{id}/toggle-quizzes', [QuizsController::class, 'toggleQuizzes'])->name('toggleQuizzes');
Route::post('/courses/{id}/toggle-assignments', [AssignmentsController::class, 'toggleAssignments'])->name('toggleAssignments');


//student_dashboard

Route::get('/student/assignments', [StudentAssignmentsController::class, 'index'])->name('student.assignments.index');



// Show assignments and quizzes for a student
Route::get('/student/assignments-quizzes', [StudentAssignmentsController::class, 'showAssignmentsAndQuizzes'])->name('student.assignments.index');

// Upload assignment
Route::post('/student/{courseId}/upload-assignment', [StudentAssignmentsController::class, 'uploadAssignment'])->name('student.uploadAssignment');

// Upload quiz
Route::post('/student/{courseId}/upload-quiz', [StudentAssignmentsController::class, 'uploadQuiz'])->name('student.uploadQuiz');

Route::get('/teacher/assignment_submission', [AssignmentSubmissionController::class, 'index'])->name('teacher.assignment_submission');

Route::get('/teacher/quiz_question_bank', [QuizBankQuestionController::class, 'index'])->name('teacher.quiz_question_bank');


Route::post('/teacher/quiz_question_bank/save-quiz-data', [QuizBankQuestionController::class, 'saveQuiz'])->name('teacher.quiz_question_bank.quiz.save');
Route::get('/quiz-bank', [QuizBankQuestionController::class, 'index'])->name('quiz-bank.index');
Route::post('/save-quiz', [QuizBankQuestionController::class, 'saveQuiz'])->name('quiz-bank.save');



// viewQuiz

Route::get('/teacher/view_quizzes', [ViewQuizesController::class, 'index'])->name('teacher.view_quizzes.index');
// Route::get('/teacher/view_quizzes/print/{subjectId}', [ViewQuizesController::class, 'print'])->name('teacher.view_quizzes.print');




Route::get('/teacher/view_quizzes/views/{subjectId}', [ViewQuizesController::class, 'views'])->name('teacher.view_quizzes.views');
