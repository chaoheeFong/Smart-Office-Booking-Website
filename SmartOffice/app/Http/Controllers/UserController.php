<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\v;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function adminReadList() {
        
        if(Gate::allows('isAdmin')){
        $roomsList = Room::where('approve', false)->get();
        $countRoomList = $roomsList->count();
        return view('Admin/admin', [
            'roomsDetails' => $roomsList,
            'countRoomList' => $countRoomList]);
        }
    }

    
}
