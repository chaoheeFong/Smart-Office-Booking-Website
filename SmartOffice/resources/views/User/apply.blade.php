@extends('layouts.userLayout')
@section('main_content')

<div>
    <h4 class="text-white">Please fill your information into the form below to apply:</h2>
</div>

<form class="row" method="POST">
    <div class="col-10">
        <input class="form-control" type="email" placeholder="Email">
    </div>
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
          <input autocomplete="on" type="text" class="form-control" id="dto"  placeholder="End Date" name="dto"  value="{{old('dto')}}"/>
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-calendar"></i>
            </span>
          </span>
        </div>
    </div>
    <div class="col-10">
        <select class="form-control">
            <option>Kuala Lumpur</option>
            <option>Cheras</option>
            <option>Kajang</option>
            <option>Sungai Long</option>
        </select>
    </div>
    <div class="col-10">
        <input class="form-control" type="textarea" placeholder="Description">
    </div>
    <div class="col-10">
        <div class="form-control">
            <label>Image of the office: </label>
            <input type="file"><br>
        </div>
    </div>
    <div class="col-10">
        <button class="btn btn-md btn-warning text-white" type="submit">Submit</button>
    </div>
</form>


@endsection