<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.get.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.post.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('rooms', RoomController::class)->except('show');
        Route::post('/rooms/data', [RoomController::class, 'getListRoom'])->name('rooms.data');

        Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::post('/users/data', [UserController::class, 'getListUser'])->name('users.data');
    });
});

Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/search/rooms', [HomeController::class, 'searchRoom'])->name('search.room');
