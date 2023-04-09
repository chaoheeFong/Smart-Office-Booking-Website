<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('can:isAdmin');
    }
    public function adminHome() {
        
        if(Gate::allows('isAdmin')){
        $roomsList = Room::where('approve', false)->get();
        $countRoomList = $roomsList->count();
        return view('Admin/admin', [
            'roomsDetails' => $roomsList,
            'countRoomList' => $countRoomList]);
        }
    }
    
    public function adminRoomList() {
        $roomsList = Room::where('approve', false)->get();
        $today = Carbon::now();
        $availableRoomList = Room::distinct()->leftjoin('bookings', 'bookings.room_id', '=', 'rooms.id')->whereNull('bookings.start_date')->where('approve', true)
        ->orwhere(
            function ($query) use ($today) {
                $query->where('bookings.start_date', '>' ,$today)->whereNot('bookings.end_date', '>=' ,$today);
            }
            )
        ->select('rooms.id AS id', 'rooms.name AS name', 'rooms.location AS location', 'rooms.price AS price', 'rooms.capacity AS capacity', 'rooms.description AS description')
        ->get();
        $unavailableRoomList = Room::distinct()->leftjoin('bookings', 'bookings.room_id', '=', 'rooms.id')->where('approve', true)
        ->where(
            function ($query) use ($today) {
                $query->where('bookings.start_date', '<' ,$today)->whereNot('bookings.end_date', '>=' ,$today);
            }
            )
        ->select('rooms.id AS id', 'rooms.name AS name', 'rooms.location AS location', 'rooms.price AS price', 'rooms.capacity AS capacity', 'rooms.description AS description')
        ->get();
        return view('Admin/adminRoomList', [
            'roomsDetails' => $roomsList,
            'availableRoomsDetails' => $availableRoomList,
            'unavailableRoomsDetails' => $unavailableRoomList
        ]);
    }

    public function adminCreateBooking() {
        $userName = User::where('role', 'user')->get(['name', 'email']);
        $roomList = Room::where('approve', true)->get();
        return view('Admin/adminAddBooking', ['userName' => $userName, 'roomList' => $roomList]);
    }
}
