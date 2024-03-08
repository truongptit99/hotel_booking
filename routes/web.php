<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\RoomController as ClientRoomController;
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

        Route::get('/bookings/index', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::post('/bookings/data', [AdminBookingController::class, 'getListBooking'])->name('bookings.data');
    });
});

Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'rooms'], function () {
    Route::post('/search', [ClientRoomController::class, 'searchRoom'])->name('search.room');
    Route::get('{slug}', [ClientRoomController::class, 'getRoomDetail'])->name('get.room.detail');
    Route::post('/check-availability', [ClientRoomController::class, 'checkAvailability'])->name('check.room.availability');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/system', [BookingController::class, 'getBookingSystem'])->name('get.booking.system');
    Route::post('/submit', [BookingController::class, 'submitBooking'])->name('submit.booking');
});

Route::get('/payment/success/{bookingId}', [PaymentController::class, 'updatePaymentStatusSuccess'])->name('update.payment.status.success');
