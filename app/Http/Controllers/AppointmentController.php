<?php

namespace App\Http\Controllers;

use App\Appointment;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the appointment listing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = now();

        $appointments = Appointment::with('customer')->orderBy('start_at')->orderBy('end_at')->paginate(5);
        $total_appointments = $appointments->total();

        //  foreach ($appointments as $appt)
        //  {
        //      dump($appt);
        //  }
        
        return view('appointments', [ 'appointments' => $appointments, 'total_appointments' => $total_appointments ]);
    }
}
