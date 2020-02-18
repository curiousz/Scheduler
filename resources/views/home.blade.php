@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @empty($appointments)
                        There are no upcoming appointments.
                    @endempty

                    @isset($appointments)

                        @if ($appointments->count() > 0)
                            @if ($appointments->count() == $total_appointments)
                                Showing {{ $total_appointments }} {{ Str::plural('appointment', $total_appointments) }}.
                            @endif
                            <ul id="upcoming_appointments">

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
                            @if ($appointments->count() < $total_appointments)
                                <a href="">view all {{ $total_appointments }} {{ Str::plural('appointment', $total_appointments) }}</a>
                            @endif
                            
                        @else
                            You have no upcoming appointments.
                        @endif
                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
