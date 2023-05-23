@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <form action="{{ url('flights/store') }}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input name="name" type="text">
            <br>
            <label for="flight_number">Number</label>
            <input name="flight_number" type="text">
            <br>
            <input type="submit" value="Save">
        </form>
    </div>
@endsection
