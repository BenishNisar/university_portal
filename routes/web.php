<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
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

