<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ImageController;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Trang hiển thị form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show'); // Tên route khác nếu cần
Route::post('/login', [AuthController::class, 'login'])->name('login'); // Route xử lý việc gửi form login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', NewsController::class); // Các route CRUD cho news
        Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])->name('news.upload_image'); // Route upload image
        Route::resource('images', ImageController::class); // Các route cho images
        // Các route admin khác
    });
});