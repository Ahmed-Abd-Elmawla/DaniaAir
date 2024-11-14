<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Admins\AdminsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Categories\CategoriesController;
use App\Http\Controllers\Dashboard\SafetyItems\SafetyItemsController;
use App\Http\Controllers\Web\User\SafetyReports\SafetyReportController;
use App\Http\Controllers\Dashboard\Notifications\NotificationController;
use App\Http\Controllers\Dashboard\SafetyReports\SafetyReportsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', function () {
            return view('Web.main');
        })->name('web.home');

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name(name: '_login');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Web reports routs -------------------------------------------------------------------------------------------------------------
        Route::group(['prefix' => 'report'], function () {
            Route::get('/', [SafetyReportController::class, 'index'])->name('report.index');
            Route::post('/store', [SafetyReportController::class, 'store'])->name('report.store');
        });


        Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
            // Route::group(['prefix' => 'dashboard'], function () {

            Route::get('/', [App\Http\Controllers\Dashboard\Home\HomeController::class, 'index'])->name('dashboard');
            Route::get('/notifications/{id}', [NotificationController::class, 'read'])->name('markAsRead');

            // Admins routs ------------------------------------------------------------------------------------------------------------
            Route::group(['prefix' => 'admins'], function () {
                Route::get('/', [AdminsController::class, 'index'])->name('admins.index');
                Route::post('/store', [AdminsController::class, 'store'])->name('admins.store');
                Route::post('/update/{admin}', [AdminsController::class, 'update'])->name('admins.updateInfo');
                Route::delete('/{admin}', [AdminsController::class, 'destroy'])->name('admins.delete');
            });

            // Categories routs ---------------------------------------------------------------------------------------------------------
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
                Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
                Route::post('/update/{category}', [CategoriesController::class, 'update'])->name('categories.update');
                Route::delete('/{category}', [CategoriesController::class, 'destroy'])->name('categories.delete');
            });

            // Items routs ---------------------------------------------------------------------------------------------------------
            Route::group(['prefix' => 'items'], function () {
                Route::get('/', [SafetyItemsController::class, 'index'])->name('items.index');
                Route::post('/store', [SafetyItemsController::class, 'store'])->name('items.store');
                Route::post('/update/{safetyItem}', [SafetyItemsController::class, 'update'])->name('items.update');
                Route::delete('/{safetyItem}', [SafetyItemsController::class, 'destroy'])->name('items.delete');
            });

            // Reports routs ---------------------------------------------------------------------------------------------------------
            Route::group(['prefix' => 'reports'], function () {
                Route::get('/', [SafetyReportsController::class, 'index'])->name('reports.index');
                Route::delete('/{report}', [SafetyReportsController::class, 'destroy'])->name('reports.delete');
            });
        });
    }
);
// Auth::routes();
