@extends('layouts.userLayout')
@section('main_content')

<div>
    <table id="mybooking" class="table">
        <thead class="p-2 text-white">
            <tr>
                <th>Location</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            <tr>
        </thead>
        <tbody class="p-2 text-white">
            <tr>
                <td>Kuala Lumpur</td>
                <td>02/03/2023</td>
                <td>05/03/2023</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm mr-2">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection