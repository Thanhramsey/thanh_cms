<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use \UniSharp\LaravelFilemanager\Lfm; // Đừng quên dòng này ở đầu file

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Trang hiển thị form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show'); // Tên route khác nếu cần
Route::post('/login', [AuthController::class, 'login'])->name('login'); // Route xử lý việc gửi form login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
   });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', NewsController::class); // Các route CRUD cho news
        Route::resource('images', ImageController::class);
        Route::resource('categorys', CategoryController::class);
        Route::resource('users', UserController::class);
         Route::resource('roles', RoleController::class);
        Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])->name('news.upload_image'); // Route upload image
        Route::post('/news/upload-media', [NewsController::class, 'uploadMedia'])->name('news.upload_media'); // Route upload image
        // Các route admin khác
    });
});