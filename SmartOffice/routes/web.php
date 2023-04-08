<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth'], function () {
    
    //Admin route  
    Route::group(['middleware' => 'can:isAdmin'], function () {
        Route::get('/admin', [UserController::class, 'adminReadList']);
        Route::get('/bookingList', function () {
            return view('Admin/adminBookingList');
        });
        Route::get('/roomList', [RoomController::class, 'adminRoomList']);

        //admin action
        Route::get('/approveRoom/{id}', [RoomController::class, 'approveRoom'])->name('room.approve');
        Route::get('/deleteRoom/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');
        Route::get('/ModifyRoom/{id}', [RoomController::class, 'editRoom'])->name('room.edit');
        Route::post('/updateRoom', [RoomController::class, 'store']);
        Route::get('/ModifyBooking/{id}', [BookingController::class, 'editBooking'])->name('booking.edit');
        Route::post('/updateBooking', [RoomController::class, 'store']);
    });
    //User route
    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/apply', [RoomController::class, 'create']);
    Route::post('/addRoom', [RoomController::class, 'store']);
    Route::get('/mybooking', function () {
        return view('User/mybooking');
    });

    Route::get('/home', [RoomController::class, 'index']);

    Route::get('/search', [RoomController::class, 'search']);

    Route::get('/room/{id}',  [RoomController::class, 'oneroom']);

    Route::post('/bookingConfirmation',  [BookingController::class, 'bookingConfirmation']);

    
    Route::permanentRedirect('/login', '/home');
});

Route::group(['middleware' => ['prevent-history', 'guest']], function(){
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
    Route::get('/register/user', [RegisterController::class,'showUserRegisterForm'])->name('register');
    Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
    Route::post('/login', [LoginController::class,'userLogin']);
    Route::post('/register', [RegisterController::class,'registerUser']);
    Auth::routes();
});
Route::get('logout', [LoginController::class,'logout']);