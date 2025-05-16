<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PortalController; // Thêm controller cho portal
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MenuController;
use \UniSharp\LaravelFilemanager\Lfm;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Admin Routes (Require Authentication)
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', NewsController::class);
        Route::resource('images', ImageController::class);
        Route::resource('categorys', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('menus', MenuController::class); // Thêm dòng này
        Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])->name('news.upload_image');
        Route::post('/news/upload-media', [NewsController::class, 'uploadMedia'])->name('news.upload_media');
        // Các route admin khác
    });
});

// Portal Routes
Route::prefix('/')->name('portal.')->group(function () {
    Route::get('/', [PortalController::class, 'index'])->name('home');
    // Các route khác của portal sẽ được thêm vào đây
});