<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $appointments = Appointment::get();
        } else {
            $appointments = Appointment::where('user_id', '=', Auth::id())->get();
        }

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

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return back();
    }
}
