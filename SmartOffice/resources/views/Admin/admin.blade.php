@php
    $bookings = array("id"=>'1', 
    'date'=>'20 January 2023', '
    name'=>'Shawn Liu Han Sheng', 
    'place'=>'Room 2',
    'pax'=> '3',
    );


@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/admin.scss')
    @vite('resources/js/app.js')
    <title>Admin Panel</title>
</head>
<body>
    <x-header user="admin" />

    <div>
        <div class="grid">
            <div class ="col-6">
                <div>
                <h1>Latest Booking</h1>
                <div class="h-20rem listBox">
                    @foreach ($bookings as $item)
                        <x-admin-booking-card />
                    @endforeach
                    <a href="" class="no-underline text-cyan-900">Show More...</a>
                </div>
                <h1>Room Request</h1>
                <div class="h-10rem listBox">

                    @foreach ($bookings as $item)
                        <x-admin-room-card isApproved=0/>
                    @endforeach
                    <a href="" class="no-underline text-cyan-900">Show More...</a>
                </div>
                </div>
            </div>
            <div class="col-6">
                <div class="hi"> 
                    <h1 class="w-full">Booking Summary</h1>
                    <div class="grid">
                        <div class="summuryBox bg-blue-200">
                            <h2 class="pt-1 pl-3">Today's Booking</h2>
                            <h2 class="absolute right-0 pr-3 top-50" >30</h2>
                        </div>
                        <div class="summuryBox bg-green-200">
                            <h2 class="pt-1 pl-3">Available Seats</h2>
                            <h2 class="absolute right-0 pr-3 top-50" >30</h2>
                        </div>
                        <div class="summuryBox bg-yellow-200">
                            <h2 class="pt-1 pl-3">Room Request</h2>
                            <h2 class="absolute right-0 pr-3 top-50" >30</h2>
                        </div>
                        <div class="summuryBox bg-red-200">
                            <h2 class="pt-1 pl-3">Total Sales</h2>
                            <h2 class="absolute right-0 pr-3 top-50" >30</h2>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <h1 class="col-12">Quick Actions</h1>
                    <button class="buttonStyle">
                        <a href="" class="text-color">
                            <span class="pi pi-book">
                            <span class="font-bold">Add Booking</span>
                        </a>
                    </button>
                    <button class="buttonStyle">
                        <a href="" class="text-color">
                            <span class="pi pi-home">
                            <span class="font-bold">Add Room</span>
                        </a>
                    </button>
                    <button class="buttonStyle">
                        <a href="bookingList" class="text-color">
                            <span class="pi pi-home">
                            <span class="font-bold">Booking List</span>
                        </a>
                    </button>
                    <button class="buttonStyle">
                        <a href="roomList" class="text-color">
                            <span class="pi pi-home">
                            <span class="font-bold">Room List</span>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>