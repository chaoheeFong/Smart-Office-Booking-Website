<?php

use Illuminate\Support\Facades\Route;

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
//Admin route 

Route::get('/', function () {
    return view('welcome');
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
    return view('User/home');
});

Route::get('/apply', function () {
    return view('User/apply');
});

Route::get('/mybooking', function () {
    return view('User/mybooking');
});
