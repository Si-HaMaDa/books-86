<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::paginate();

        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store()
    {
        // Validate the request...

        $flight = new Flight;

        $flight->name = request()->name;
        $flight->flight_number = request()->flight_number;

        $flight->save();

        return redirect('/flights');
    }
}
