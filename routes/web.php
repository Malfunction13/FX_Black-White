<?php

use App\Http\Controllers\AdmDashboardController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can users web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/register', [RegisterController::class,'registration'])->name('register');
Route::post('/register', [RegisterController::class,'registerUser'])->name('register');

Route::get('/login', [LoginController::class,'loginForm'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LogoutController::class,'logout'])->name('logout');
Route::get('/profile', [ProfileController::class,'profile'])->name('profile')->middleware('auth');

Route::get('/', [IndexController::class,'index'])->name('index');

Route::get('/posts/', [PostController::class,'postsIndex'])->name('postsIndex');
Route::post('/posts/', [PostController::class,'createPost'])->name('createPost');
Route::get('/posts/all', [PostController::class,'allPosts'])->name('allPosts');

Route::get('/calendar', [CalendarController::class, 'calendar'])->name('calendar');


//just for testing purposes
Route::post('/profile', [CategoryController::class, 'createCategory'])->name('createCategory');

//admin
Route::get('/admin', [AdmDashboardController::class, 'dashboard'])->name('admDashboard');
//Route::get('/admin/users/{id}', [AdmDashboardController::class,'userDetails'])->name('userDetails'); //noob way
Route::get('/admin/users/{user}', [AdmDashboardController::class, 'userDetails'])->name('userDetails');  //proper way
Route::get('/admin/users/{user}/manage', [UserManagementController::class, 'userManagement'])->name('userManagement');
Route::put('/admin/users/{user}/manage/update', [UserManagementController::class, 'userUpdate'])->name('userUpdate');
Route::delete('/admin/users/{user}/delete', [UserManagementController::class, 'userDelete'])->name('userDelete');
Route::post('/admin/users/{user}/manage/activate', [UserManagementController::class, 'userActivate'])->name('userActivate');
Route::post('/admin/users/{user}/manage/deactivate', [UserManagementController::class, 'userDectivate'])->name('userDeactivate');
Route::post('/admin/users/{user}/manage/extend', [UserManagementController::class, 'userExtend'])->name('userExtend');

Route::get('/admin/admins', [AdminManagementController::class, 'adminManagement'])->name('adminManagement');
