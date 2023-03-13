@extends('layouts.userLayout')
@section('main_content')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <h2 class="p-2 text-white">Welcome {{Auth::user()->name}} :)</h1>
</head>
<body>


@section('content')

<form class="row" method="GET" action="/search">
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

    
</container>





  

</body>
<div class="col-md-12">
<h2 class="p-2 text-white">
    Interested in joining us to rent your office? <br>
    Welcome to apply here!!!
</h2>
</div>
<form action="/apply">
    <button class="btn btn-md btn-warning text-white" type="submit" action="/apply">Apply</button>
</form>

@endsection