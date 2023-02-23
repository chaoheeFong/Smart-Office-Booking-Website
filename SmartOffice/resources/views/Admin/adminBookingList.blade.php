<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/admin.scss')
    @vite('resources/js/app.js')
    <title>Booking List</title>
</head>
<body>
    <x-header user='admin'/>
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
</body>
</html>