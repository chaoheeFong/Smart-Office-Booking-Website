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
            'user_id' => 'required|Numeric',
            'dfrom' => 'required|min:2|max:100',
            'dto' => 'required|min:2|max:100',
        ];

        $validate =  Validator::make($request->all(), $rules, []);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput($request->all());
        }


        if (
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dfrom'), $m1) &&
            preg_match("/(\d+)\/(\d+)\/(\d+)/", $request->get('dto'), $m2)
        ) {
            $y = $m1[3];
            $m = $m1[1];
            $d = $m1[2];
            $sdfrom = "$y-$m-$d";
            $y = $m2[3];
            $m = $m2[1];
            $d = $m2[2];
            $sdto = "$y-$m-$d";

            $sroom = Booking::where('room_id', $request->get('room_id'))->where(
                function ($query) use ($sdfrom, $sdto) {
                    $query
                        ->orwhere(
                            function ($query) use ($sdfrom, $sdto) {
                                $query
                                    ->where('dto', '>=', $sdfrom)
                                    ->where('dto', '<=',  $sdto);
                            }
                        )
                        ->orwhere(
                            function ($query) use ($sdfrom, $sdto) {
                                $query
                                    ->where('dfrom', '>=', $sdfrom)
                                    ->where('dfrom', '<=',  $sdto);
                            }
                        );
                }
            );
            // dd($sroom);
            // $query = str_replace(array('?'), array('%s'), $sroom->toSql());
            // $query = vsprintf($query, $sroom->getBindings());
            // // dd($query);
            // dd($sroom->get()->count());


            $date1 = Carbon::createFromFormat('Y-m-d', $sdfrom);
            $date2 = Carbon::createFromFormat('Y-m-d', $sdto);


            if ($sroom->get()->count() > 0) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'not availeble' => ['This room has been booked for the dates you have selected'],
                ]);
                throw $error;
            } elseif ($date1->gt($date2)) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'date error' => ['Date TO is less than date FROM'],
                ]);
                throw $error;
            }
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'dates' => ['Dates From or To not set'],
            ]);
        }



        $bookingConfirmation = new Booking();

        $bookingConfirmation->room_id = $request->input('room_id');
        $bookingConfirmation->user_id = $request->input('user_id');
        $bookingConfirmation->dfrom = $sdfrom;
        $bookingConfirmation->dto = $sdto;

        $bookingConfirmation->save();
        return view('bookingConfirmation', []);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
