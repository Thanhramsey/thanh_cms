<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard'); // Trỏ đến file dashboard.blade.php trong thư mục dashboard
});


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Trang hiển thị form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show'); // Tên route khác nếu cần
Route::post('/login', [AuthController::class, 'login'])->name('login'); // Route xử lý việc gửi form login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard'); // Trỏ đến file dashboard.blade.php trong thư mục dashboard
    });
});