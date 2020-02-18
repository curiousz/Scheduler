@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointments</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @empty($appointments)
                        There are no appointments.
                    @endempty

                    @isset($appointments)

                        @if ($appointments->count() > 0)
                            @if ($appointments->count() == $total_appointments)
                                Showing {{ $total_appointments }} {{ Str::plural('appointment', $total_appointments) }}.
                            @elseif ($appointments->count() < $total_appointments)
                                Showing {{ $appointments->count() }} of {{ $total_appointments }} {{ Str::plural('appointment', $total_appointments) }}.
                            @endif
                            <ul id="appointment_listing">

                                @foreach($appointments as $appointment)

                                <li>
                                    {{ $appointment->name }}, for 
                                    @if (!empty($appointment->customer->email)) 
                                    <a href="mailto:{{ $appointment->customer->email }}">@endif{{ $appointment->customer->name }}@if (!empty($appointment->customer->email))</a>@endif
                                    @
                                    {{ Carbon::format_date_range($appointment->start_at->setTimezone('America/Denver'), $appointment->end_at->setTimezone('America/Denver')) }}
                                </li>

                                @endforeach

                            </ul>

                            {{ $appointments->links() }}
                            
                        @else
                            You have no appointments.
                        @endif
                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
