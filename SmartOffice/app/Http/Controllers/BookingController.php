<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function bookingConfirmation(Request $request) {
        $rules = [
            'room_id' => 'required|Numeric',
            'start_date' => 'required|min:2|max:100',
            'end_date' => 'required|min:2|max:100',
        ];

        $validate =  Validator::make($request->all(), $rules, []);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput($request->all());
        }


        if (
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('start_date'), $m1) &&
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('end_date'), $m2)
        ) {
            $y = $m1[3];
            $m = $m1[1];
            $d = $m1[2];
            $sdfrom = "$y-$m-$d";
            $y = $m2[3];
            $m = $m2[1];
            $d = $m2[2];
            $sdto = "$y-$m-$d";

            // Check if the room is already booked for the selected dates
            $isRoomBooked = Booking::where('room_id', $request->get('room_id'))
            ->where(function ($query) use ($sdfrom, $sdto) {
            $query
                ->whereBetween('start_date', [$sdfrom, $sdto])
                ->orWhereBetween('end_date', [$sdfrom, $sdto])
                ->orWhere(function ($query) use ($sdfrom, $sdto) {
                    $query
                        ->where('start_date', '<', $sdfrom)
                        ->where('end_date', '>', $sdto);
                });
        })
        ->exists();

        if ($isRoomBooked) {
            $error = \Illuminate\Validation\ValidationException::withMessages(['not available' => ['This room has been booked for the dates you have selected'],]);
            throw $error;
        } elseif ($sdfrom >= $sdto) {
            $error = \Illuminate\Validation\ValidationException::withMessages(['date error' => ['Date TO is less than or equal to date FROM'],]);
            throw $error;
        }   
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages(['dates' => ['Dates From or To not set'],]);
            throw $error;
        }




        $bookingConfirmation = new Booking();

        $bookingConfirmation->room_id = $request->input('room_id');
        $bookingConfirmation->user_id = auth()->user()->id;
        $bookingConfirmation->booking_status = $request->input('booking_status');
        $bookingConfirmation->start_date = $sdfrom;
        $bookingConfirmation->end_date = $sdto;

        $bookingConfirmation->save();
        return view('User/bookingConfirmation', []);
    }

    public function myBooking(){
        $bookings = Booking::all();
        return view('User.myBooking', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('User.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);
        return view('User.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->save();

        return redirect()->route('User.mybooking')->with('success', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);
        $booking->delete();

        return redirect()->route('User.mybooking')->with('success', 'Booking deleted successfully');
    }
}
