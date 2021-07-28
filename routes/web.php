<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Profile\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\AdmDashboardController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\PostManagementController;
use App\Http\Controllers\Admin\CategoryManagementController;


use Illuminate\Support\Facades\Route;
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

//VISITOR AREA
Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/articles/{post:slug}', [IndexController::class, 'singlePost'])->name('singlePost');
Route::get('/calendar', [IndexController::class, 'calendar'])->name('calendar');
Route::get('/subscribe', [IndexController::class,'subscribeDetails'])->name('subscribe');
Route::post('/subscribe', [ProfileController::class,'subscribeContact'])->name('subscribe');

// REGISTRATION
Route::get('/register', [RegisterController::class,'registration'])->name('register');
Route::post('/register', [RegisterController::class,'registerUser'])->name('register');

// RESET PASSWORD
Route::post('/forgot-password', [ProfileController::class,'passwordResetLink'])->name('password.request');
Route::get('/reset-password/{token}', [ProfileController::class,'passwordResetForm'])->name('password.reset');
Route::post('/reset-password/{token}', [ProfileController::class,'passwordReset'])->name('password.reset');

// LOGIN
Route::get('/login', [LoginController::class,'loginForm'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LogoutController::class,'logout'])->name('logout');

// PROFILE
Route::group(['middleware' => ['auth'], 'prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class,'profile'])->name('profile');
    Route::post('/reset-email/{user}', [ProfileController::class,'emailReset'])->name('emailReset');
    Route::post('/extend-subscription/{user}', [ProfileController::class,'subscriptionExtend'])->name('profileExtend');

});

// ADMIN
Route::group(['middleware' => ['auth', 'adminAccess'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdmDashboardController::class, 'dashboard'])->name('admDashboard');
    // users management
    Route::get('/users', [UserManagementController::class, 'userOverview'])->name('userOverview');
    Route::get('/users/search', [UserManagementController::class, 'userSearch'])->name('userSearch');
    Route::get('/users/filtered-search', [UserManagementController::class, 'filteredSearch'])->name('filteredSearch');
    Route::get('/users/{user}', [UserManagementController::class, 'userDetails'])->name('userDetails');
    Route::patch('/users/{user}', [UserManagementController::class, 'userUpdate'])->name('userUpdate');
    Route::delete('/users/{user}', [UserManagementController::class, 'userDelete'])->name('userDelete');
    Route::post('/users/{user}/activate', [UserManagementController::class, 'userActivate'])->name('userActivate');
    Route::post('/users/{user}/deactivate', [UserManagementController::class, 'userDeactivate'])->name('userDeactivate');
    Route::patch('/users/{user}/extend', [UserManagementController::class, 'userExtend'])->name('userExtend');

    // admin management
    Route::get('/admins', [AdminManagementController::class, 'adminOverview'])->name('adminOverview');

    // posts management
    Route::get('/posts', [PostManagementController::class, 'postOverview'])->name('postOverview');

    // ajax depends on abs path
    Route::get('/posts/search', [PostManagementController::class, 'postSearch'])->name('postSearch');
    Route::get('/posts/search-category', [PostManagementController::class, 'postByCategory'])->name('postByCategory');
    Route::post('/posts/create', [PostManagementController::class, 'postCreate'])->name('postCreate');
    Route::get('/posts/{post}', [PostManagementController::class, 'postDetails'])->name('postDetails');
    Route::put('/posts/{post}', [PostManagementController::class, 'postUpdate'])->name('postUpdate');
    Route::delete('/posts/{post}', [PostManagementController::class, 'postDelete'])->name('postDelete');

    // categories management
    Route::get('/categories', [CategoryManagementController::class, 'categoryOverview'])->name('categoryOverview');
    Route::post('/categories/create', [CategoryManagementController::class, 'categoryCreate'])->name('categoryCreate');
    Route::patch('/categories/{category}', [CategoryManagementController::class, 'categoryUpdate'])->name('categoryUpdate');
    Route::delete('/categories/{category}', [CategoryManagementController::class, 'categoryDelete'])->name('categoryDelete');

});
