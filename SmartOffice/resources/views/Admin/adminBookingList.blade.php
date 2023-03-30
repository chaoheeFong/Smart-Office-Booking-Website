@extends('layouts.adminLayout')
@section('title') Admin Panel @endsection
<?php
$bookings = ['','']
?>
@section('main_content')

    <div class="mx-5 my-2">
        <a href="" class="pointer-cursor no-underline absolute right-0 mr-6 mt-2 text-xl text-color hover:text-teal-500">+ Add Booking</a>
        <div>
            <h1>Today's Booking</h1>
            <div class="fullListBox">
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
            </div>
        </div>
        <div> 
            <h1>Completed Booking</h1>
            <div class="fullListBox">
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
            </div>
        </div>
        <div>
            <h1>Cancelled Booking</h1>
            <div class="fullListBox">
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
                <x-admin-booking-card />
            </div>
        </div>
    </div>
    @endsection