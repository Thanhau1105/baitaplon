<?php

// use App\Models\User;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;

// Route::get('/register',[\App\Http\Controllers\AuthController::class,'showRegistrationForm'])->name('register');
// Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
// Route::get('/login',[\App\Http\Controllers\AuthController::class,'showLoginForm'])->name('login');
// Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
// Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
// Route::get('/user/home',[\App\Http\Controllers\UserController::class,'home'])->name('user-home')->middleware('auth');
// Route::get('/admin/home',[\App\Http\Controllers\AdminController::class,'home'])->name('admin-home')->middleware('auth');
// Route::get('/post/create',[\App\Http\Controllers\PostController::class,'create'])->name('post.create');
// Route::post('/post/create',[\App\Http\Controllers\PostController::class,'store']);

// Route::post('/home',[\App\Http\Controllers\LoginController::class,'home']);
// Route::get('/home',[\App\Http\Controllers\HomeController::class,'home'])->name('home');;

// Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
// Route::post('/login',[\App\Http\Controllers\UserController::class,'postLogin'])->name('login');;
// Route::post('/admin-login',[\App\Http\Controllers\UserController::class,'admin_Login'])->name('login');;
// Route::post('/user-login',[\App\Http\Controllers\UserController::class,'user_Login'])->name('login');;
// Route::get('/register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
// Route::post('/register',[\App\Http\Controllers\UserController::class,'postRegister']);



use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

// Routes cho việc đăng ký
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Routes cho việc đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes cho trang người dùng
Route::get('/user/home', [UserController::class, 'home'])->name('user-home')->middleware('auth');

// Routes cho trang quản trị với kiểm tra vai trò
Route::get('/admin-home', [AdminController::class, 'admin_home'])->name('admin-home')->middleware(['auth', 'admin']);

// Routes cho việc tạo bài viết
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store']);

// Route cho trang chính
Route::get('/home', [HomeController::class, 'home'])->name('home');