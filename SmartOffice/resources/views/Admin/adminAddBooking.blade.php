@extends('layouts.adminLayout')
@section('title') Admin Panel @endsection


@section('main_content')
<div>
    <form action="" method="get">
        @csrf
        <div>
            <label for="userName">Select User:</label>
            <select name="userName" id="userDropdown" aria-placeholder="Choose User">
                @foreach ($userName as $user)
                    <option value="{{$user->name}}">{{$user->email}} - {{$user->name}}</option>
                @endforeach
            </select>
            
        </div>
    </form>
</div>
@endsection