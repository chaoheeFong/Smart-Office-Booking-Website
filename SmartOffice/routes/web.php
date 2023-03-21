<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Gate;
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
    Route::get('/', function () {
        return view('/User/home');
    });
    Route::get('/admin', function () {
        return view('Admin/admin');
    });
    Route::get('/bookingList', function () {
        return view('Admin/adminBookingList');
    });
    Route::get('/roomList', function () {
        return view('Admin/adminRoomList');
    });

    //User route
    Route::get('/home', function () {
        return view('/User/home');
    });

    Route::get('/apply', function () {
        return view('User/apply');
    });

    Route::get('/mybooking', function () {
        return view('User/mybooking');
    });

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


