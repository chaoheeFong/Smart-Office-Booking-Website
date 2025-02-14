@extends('layouts.userLayout')



@section('main_content')

<section class="container  bg-light">
    <div class="row featurette py-3">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">{{$room[0]['name']}}</span></h2>
          <hr />
          <div class="lead">Rooms size: <span class="text-warning fw-bold">{!! $room[0]['capacity'] !!}</span></div>
          <hr />
          <div class=" card-title pricing-card-title text-success h1 w-100" style="display: grid;">
            <span class="float-left text-xl fw-bold text-start">Price:</span>
            <span class="float-right text-xl fw-bold text-end">${{$room[0]['price']}}</span>

            </div>
          <hr />
          <p class="lead">{{$room[0]['description']}}</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="{{$room[0]['photo']}}" data-holder-rendered="true" style="width: 500px; height: auto;">
        </div>
      </div>
</section>
<section class="container py-5 bg-light" id="bookingform">
    <div class="row pt-3">
        <div class="col-12 text-center">
            <h2 class="text-success">Book Now!</h2>
        </div>
    </div>
    @if ($errors->any())
    <div class="row py-3">
        <div class="col-12">
            <div class="alert alert-danger pt-3 pb-1  mt-3 mp-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    <form  method="POST" class="bg-success pb-3" action="/bookingConfirmation">
    @csrf
    <input type="hidden" name="room_id" value="{{$room[0]['id']}}"/>
     
    <div class="row py-3">
        <div class="col-2"></div>
        <div class="col-3">
            <div class="input-group date" id="datepicker1">
                <input autocomplete="off" type="text" class="form-control" id="date" placeholder="From" name="dfrom" id="dfrom" value="{{old('dfrom')}}"/>
                <span class="input-group-append">
                <span class="input-group-text bg-light d-block" placeholder="to">
                    <i class="fa fa-calendar"></i>
                </span>
                </span>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group date" id="datepicker2">
                <input autocomplete="off" type="text" class="form-control" id="date"  placeholder="To" name="dto" id="dto"  value="{{old('dto')}}"/>
                <span class="input-group-append">
                <span class="input-group-text bg-light d-block">
                    <i class="fa fa-calendar"></i>
                </span>
                </span>
            </div>
        </div>
    </div>
    
    <div class="row pt-3">
        <div class="col-2"></div>
        <div class="col-2 input-group">
            <button class="btn btn-md btn-warning text-dark" type="submit">Confirm Booking</button>
        </div>
    </div>          
  </form>
</section>
@endsection