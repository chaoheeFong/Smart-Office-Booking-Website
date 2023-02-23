<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/admin.scss')
    @vite('resources/js/app.js')
    <title>Boking List</title>
</head>
<body>
    <div>
        
        <x-header user='admin'/>
        <a href="" class="pointer-cursor no-underline absolute right-0 mr-6 mt-2 text-xl text-color hover:text-teal-500">+ Add Room</a>
        <div>
            <h1>Available Room</h1>
            <div class="fullListBox">
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
            </div>
        </div>
        <div>
            <h1>Unavailable Room</h1>
            <div class="fullListBox">
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
            </div>
        </div>
        <div>
            <h1>Room Request</h1>
            <div class="fullListBox">
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
                <x-admin-room-card />
            </div>
        </div>
    </div>
</body>
</html>