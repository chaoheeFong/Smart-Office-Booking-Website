<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\RoomImages;
use App\Http\Controllers\RoomImagesController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index() {
        
        return view('User/home', [
            'roomslist' =>  RoomResource::collection(Room::where('approve', true)->get()),
            'dfrom' => 'From',
            'dto' => 'To',
        ]);
    }

    public function adminRoomList() {
        $roomsList = Room::where('approve', false)->get();
        return view('Admin/adminRoomList', [
            'roomsDetails' => $roomsList,
        ]);
    }

    public function search(Request $request) {
        $dfrom = 'From';
        $dto = 'To';
        if (
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dfrom'), $m1) &&
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dto'), $m2)
        ) {
            $dfrom =  $request->get('dfrom');
            $dto =  $request->get('dto');
            $y = $m1[3];
            $m = $m1[1];
            $d = $m1[2];
            $sdfrom = "$y-$m-$d";
            $y = $m2[3];
            $m = $m2[1];
            $d = $m2[2];
            $sdto = "$y-$m-$d";
            $sroom = Room::distinct()->select('rooms.id', 'rooms.name', 'photo', 'price')->leftjoin('bookings', 'bookings.room_id', '=', 'rooms.id')->whereNull('bookings.dfrom')
                ->orwhere(
                    function ($query) use ($sdfrom, $sdto) {
                        $query->where('bookings.dto', '<', "'$sdto'")->where('bookings.dfrom', '>', "'$sdfrom'");
                    }
                )->paginate(6);

            // $query = str_replace(array('?'), array('%s'), $sroom->toSql());
            // $query = vsprintf($query, $sroom->getBindings());
            // dd($query);
            // dd($sroom->count());
        } elseif (
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dfrom'), $m1) &&
            !preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dto'), $m2)
        ) {
            $dfrom =  $request->get('dfrom');
            $y = $m1[3];
            $m = $m1[1];
            $d = $m1[2];
            $sdfrom = "$y-$m-$d";
            $sroom = Room::distinct()->leftjoin('bookings', 'bookings.room_id', '=', 'rooms.id')->whereNull('bookings.dfrom')
                ->orwhere(
                    function ($query) use ($sdfrom) {
                        $query->where('bookings.dfrom', '>', "'$sdfrom'");
                    }
                )->paginate(6);
        } elseif (
            !preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dfrom'), $m1) &&
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dto'), $m2)
        ) {
            $dto =  $request->get('dto');
            $y = $m2[3];
            $m = $m2[1];
            $d = $m2[2];
            $sdto = "$y-$m-$d";
            $sroom = Room::distinct()->leftjoin('bookings', 'bookings.room_id', '=', 'rooms.id')->whereNull('bookings.dfrom')
                ->orwhere(
                    function ($query) use ($sdto) {
                        $query->where('bookings.dto', '<', "'$sdto'");
                    }
                )->paginate(6);
        } else {
            $sroom = Room::with("bookings")->paginate(6);
        }

        return view('User/home', [
            'roomslist' =>  $sroom, // RoomResource::collection($sroom),
            'dfrom' => $dfrom,
            'dto' => $dto,
        ]);
    }

    public function oneroom($id, Request $request) {

        if ($request->input('name') != null)
            $name = $request->input('name');
        else $name = '';

        return view('User/oneroom', [
            'room' =>  Room::with('images')->where('id', $id)->get(),
            'name' => $name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User/apply');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => 'integer | required',
            'capacity' => 'integer | required',

        ]);

        $approve = Auth::user()->role == UserRoleEnum::Admin ? true : false;

        
       Room::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'user_id' => Auth::id(),
            'approve' => $approve
       ]);
       
       $roomId = Room::orderBy('created_at', 'desc')->first()->id;
       (new RoomImagesController)->storeImage($request, $roomId);
   
       
       //
       if(Auth::user()->role == UserRoleEnum::User) {
            return redirect('/home');
       }
       else{
            return redirect('/admin');
       }
       
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }

    public function approveRoom($id) {
        $room = Room::find($id);
        $room->approve = true;
        $room->save();

        return redirect()->back();
    }

    public function deleteRoom($id) {
        Room::where('id', $id)->delete();

        return redirect()->back();
    }
}
