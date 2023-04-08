<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('Admin/adminRoomList', [
            'roomsDetails' => $roomsList,
        ]);
    }

    public function adminCreateBooking() {
        $userName = User::where('role', 'user')->get(['name', 'email']);
        $roomList = Room::where('approve', true)->get();
        return view('Admin/adminAddBooking', ['userName' => $userName, 'roomList' => $roomList]);
    }
}
