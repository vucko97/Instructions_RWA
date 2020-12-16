<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::get();

        return view('appointments.index', ['appointments' => $appointments]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'time' => 'required',
            'date' => 'required',
            'description' => 'required',
            'contact' => 'required',
        ]);

        // Appointment::create($request->all());

        $request->user()->appointments()->create($request->all());

        return back();
    }
}
