<?php

namespace App\Http\Controllers;

use App\Appointment;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = now();

        $account = DB::table('accounts')->where('id', 1)->first();

        $upcoming_appointments = Appointment::upcoming();
        $total_upcoming_appointments = $upcoming_appointments->count();

        $appointments = $upcoming_appointments->with('customer')
                ->orderBy('start_at')->orderBy('end_at')->take(5)
                ->get();

        //  foreach ($appointments as $appt)
        //  {
        //      dump($appt);
        //  }
        
        return view('home', [ 'accountName' => $account->name, 'appointments' => $appointments, 'total_appointments' => $total_upcoming_appointments ]);
    }
}
