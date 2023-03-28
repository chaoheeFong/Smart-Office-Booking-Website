@extends('layouts.userLayout')


@section('main_content')
<div class="container">
  <form class="container-fluid border-bottom rounded-bottom rounded-5 shadow-lg" style="border-color: gray!important" method="GET" action="/search">
      <div class="col-10">
          <div class="input-group date" id="datepicker1">
            <input autocomplete="off" type="text" class="form-control" id="dfrom" placeholder="Start Date" name="dfrom" value="{{old('dfrom')}}"/>
            <span class="input-group-append">
              <span class="input-group-text bg-light d-block" placeholder="to">
                <i class="fa fa-calendar"></i>
              </span>
            </span>
          </div>
      </div>
      <div class="col-10">
          <div class="input-group date" id="datepicker2">
            <input autocomplete="off" type="text" class="form-control" id="dto"  placeholder="End Date" name="dto"  value="{{old('dto')}}"/>
            <span class="input-group-append">
              <span class="input-group-text bg-light d-block">
                <i class="fa fa-calendar"></i>
              </span>
            </span>
          </div>
      </div>
      <div class="col-10">
          <select class="form-control" placeholder="Location">
              <option>Kuala Lumpur</option>
              <option>Cheras</option>
              <option>Kajang</option>
              <option>Sungai Long</option>
          </select>
      </div>
      <div class="col-10">
          <button class="btn btn-md btn-warning text-white" type="submit">Search</button>
      </div>
  </form>
  <br>

  <div class="flex flex-wrap">
  @foreach ($roomslist as $roomBox)
      <div class="w-19rem bg-white m-2 p-2 max-h-32rem">
        <div class="h-9rem"></div>
        <div class="relative">
          <h1>{{$roomBox->name}}</h1>
          <br>
          <p>Location: {{$roomBox->location}}</p>
          <p>Size: {{$roomBox->capacity}}</p>
          <p>Description: {{$roomBox->description}}</p>
          <div class="flex align-content-center">
            <h3>RM {{$roomBox->price}}</h3>
            <div class="mx-3 flex flex-column gap-1 justify-content-end w-6">
              <button class="w-12"><a class="no-underline" href="">Book Now</a></button>
              <button><a class="no-underline" href="/room/{{$roomBox->id}}">More Details</a></button>
            </div>
            
          </div>
        </div>
      </div>
  @endforeach
  </div>

  <div class="col-md-10">
    <h2 class="p-2 text-white">
        Interested in joining us to rent your office? <br>
        Welcome to apply here!!!
    </h2>
    <form action="/apply">
        <button class="btn btn-md btn-warning text-white" type="submit" action="/apply">Apply</button>
    </form>
  </div>
</div>
@endsection