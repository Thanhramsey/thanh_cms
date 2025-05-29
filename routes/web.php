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
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PortalNewsController;
use App\Http\Controllers\PortalProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\PortalContactController;

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
        Route::resource('productCategories', ProductCategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('configs', ConfigController::class);
        Route::resource('contacts', ContactController::class)->only(['index', 'show', 'update', 'destroy']);
          Route::resource('links', LinkController::class);
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
Route::prefix('tin-tuc')->name('portal.news.')->group(function () {
    Route::get('/{slug}', [PortalNewsController::class, 'show'])->name('show'); // Route xem chi tiết tin tức
    Route::get('/chuyen-muc/{slug}', [PortalNewsController::class, 'category'])->name('category'); // Route xem tất cả tin tức theo chuyên mục
});

Route::prefix('san-pham')->name('portal.product.')->group(function () {
    Route::get('/{slug}', [PortalProductController::class, 'show'])->name('show'); // Trang chi tiết sản phẩm
    Route::get('/danh-muc/{slug}', [PortalProductController::class, 'category'])->name('category'); // Trang danh sách sản phẩm theo danh mục
});

Route::post('/contact', [PortalContactController::class, 'store'])->name('portal.contact.store');
Route::get('/find-contact', [PortalContactController::class, 'showFindForm'])->name('portal.contact.find.form');
Route::get('/find-contact', [PortalContactController::class, 'showFindForm'])->name('portal.contact.find.form');
Route::get('/lien-he', [PortalController::class, 'lienHe'])->name('portal.page.lienhe');
Route::get('/gioi-thieu', [PortalController::class, 'gioiThieu'])->name('portal.page.gioi-thieu');
Route::get('/co-cau-to-chuc', [PortalController::class, 'coCauToChuc'])->name('portal.page.co-cau-to-chuc');
Route::get('/danh-sach-nhan-vien', [PortalController::class, 'danhSachNhanVien'])->name('portal.page.danhsachnhanvien');

Route::get('/tin-noi-bo', [PortalNewsController::class, 'category'])->name('portal.news.noi-bo')->defaults('slug', 'tin-noi-bo');
Route::get('/kien-thuc-y-khoa', [PortalNewsController::class, 'category'])->name('portal.news.noi-bo')->defaults('slug', 'kien-thuc-y-khoa');