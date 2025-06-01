<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ChairmanController;
use App\Http\Controllers\admin\CoreValueController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\PioneersController;
use App\Http\Controllers\admin\EventsController;
use App\Http\Controllers\admin\JobOpeningController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\admin\VisionController;
use App\Http\Controllers\admin\WhoWeAreController;
use App\Http\Controllers\admin\WorkplaceController;
use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/project', [HomeController::class, 'project'])->name('project');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/event', [HomeController::class, 'event'])->name('event');

Route::get('/admin', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('check_login', [AdminController::class, 'checklogin'])->name('check_login');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'AdminAuth'], function () {
    // blogs
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/add', [BlogController::class, 'add'])->name('add');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [BlogController::class, 'update'])->name('update');
        Route::post('/delete', [BlogController::class, 'delete'])->name('delete');
        Route::post('/status', [BlogController::class, 'status'])->name('status');
    });

    // pioneers
    Route::prefix('pioneers')->name('pioneers.')->group(function () {
        Route::get('/', [PioneersController::class, 'index'])->name('index');
        Route::get('/add', [PioneersController::class, 'add'])->name('add');
        Route::post('/store', [PioneersController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [PioneersController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [PioneersController::class, 'update'])->name('update');
        Route::post('/delete', [PioneersController::class, 'delete'])->name('delete');
        Route::post('/status', [PioneersController::class, 'status'])->name('status');
    });

    // Media / Events
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('index');
        Route::get('/add', [EventsController::class, 'add'])->name('add');
        Route::post('/store', [EventsController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [EventsController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [EventsController::class, 'update'])->name('update');
        Route::post('/delete', [EventsController::class, 'delete'])->name('delete');
        Route::post('/status', [EventsController::class, 'status'])->name('status');
    });

    // Job Opening
    Route::prefix('job_opening')->name('job_opening.')->group(function () {
        Route::get('/', [JobOpeningController::class, 'index'])->name('index');
        Route::get('/add', [JobOpeningController::class, 'add'])->name('add');
        Route::post('/store', [JobOpeningController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [JobOpeningController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [JobOpeningController::class, 'update'])->name('update');
        Route::post('/delete', [JobOpeningController::class, 'delete'])->name('delete');
        Route::post('/status', [JobOpeningController::class, 'status'])->name('status');
    });

    // Project
    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/add', [ProjectController::class, 'add'])->name('add');
        Route::post('/store', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [ProjectController::class, 'update'])->name('update');
        Route::post('/delete', [ProjectController::class, 'delete'])->name('delete');
        Route::post('/status', [ProjectController::class, 'status'])->name('status');
    });

    // About Us
    Route::prefix('about_us')->name('about.')->group(function () {
        // Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('/', [AboutController::class, 'add'])->name('add');
        Route::post('/store', [AboutController::class, 'store'])->name('store');
    });

    // Who We Are
    Route::prefix('who_we_are')->name('who_we_are.')->group(function () {
        Route::get('/', [WhoWeAreController::class, 'add'])->name('add');
        Route::post('/store', [WhoWeAreController::class, 'store'])->name('store');
    });

    // Vision
    Route::prefix('vision')->name('vision.')->group(function () {
        Route::get('/', [VisionController::class, 'add'])->name('add');
        Route::post('/store', [VisionController::class, 'store'])->name('store');
    });

    // Mission
    Route::prefix('mission')->name('mission.')->group(function () {
        Route::get('/', [MissionController::class, 'add'])->name('add');
        Route::post('/store', [MissionController::class, 'store'])->name('store');
    });

    // Workplace
    Route::prefix('workplace')->name('workplace.')->group(function () {
        Route::get('/', [WorkplaceController::class, 'add'])->name('add');
        Route::post('/store', [WorkplaceController::class, 'store'])->name('store');
    });

    // Social Media
    Route::prefix('social_media')->name('social_media.')->group(function () {
        Route::get('/', [SocialMediaController::class, 'index'])->name('index');
        Route::get('/add', [SocialMediaController::class, 'add'])->name('add');
        Route::post('/store', [SocialMediaController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [SocialMediaController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [SocialMediaController::class, 'update'])->name('update');
        Route::post('/delete', [SocialMediaController::class, 'delete'])->name('delete');
        Route::post('/status', [SocialMediaController::class, 'status'])->name('status');
    });

    // Testimonial
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', [TestimonialsController::class, 'index'])->name('index');
        Route::get('/add', [TestimonialsController::class, 'add'])->name('add');
        Route::post('/store', [TestimonialsController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [TestimonialsController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [TestimonialsController::class, 'update'])->name('update');
        Route::post('/delete', [TestimonialsController::class, 'delete'])->name('delete');
        Route::post('/status', [TestimonialsController::class, 'status'])->name('status');
    });

    // Core Value
    Route::prefix('core_values')->name('core_values.')->group(function () {

        Route::post('/core/description/store', [CoreValueController::class, 'coreDescriptionStore'])->name('core_description_store');

        Route::get('/', [CoreValueController::class, 'index'])->name('index');
        Route::get('/add', [CoreValueController::class, 'add'])->name('add');
        Route::post('/store', [CoreValueController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [CoreValueController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [CoreValueController::class, 'update'])->name('update');
        Route::post('/delete', [CoreValueController::class, 'delete'])->name('delete');
        Route::post('/status', [CoreValueController::class, 'status'])->name('status');
    });

    // Chairman
    Route::prefix('chairman')->name('chairman.')->group(function () {
        Route::get('/', [ChairmanController::class, 'index'])->name('index');
        Route::get('/add', [ChairmanController::class, 'add'])->name('add');
        Route::post('/store', [ChairmanController::class, 'store'])->name('store');
        Route::get('/edit-{id}', [ChairmanController::class, 'edit'])->name('edit');
        Route::post('/update-{id}', [ChairmanController::class, 'update'])->name('update');
        Route::post('/delete', [ChairmanController::class, 'delete'])->name('delete');
        Route::post('/status', [ChairmanController::class, 'status'])->name('status');
    });

    // Settings
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('/savecontact', [SettingsController::class, 'savecontact'])->name('savecontact');
        Route::post('/sociallinks', [SettingsController::class, 'sociallinks'])->name('sociallinks');
        Route::post('/deletesociallinks', [SettingsController::class, 'deletesociallinks'])->name('deletesociallinks');
        Route::post('/other', [SettingsController::class, 'other'])->name('other');
    });
    // clear-cache
    Route::get('clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->back()->with('success', 'Cache Cleared Successfully');
    })->name('clearcache');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});
