<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Carbon::macro('format_date_range', static function (Carbon $start, Carbon $end) 
        {
            if ($start->year != $end->year)
            {
                return $start->format('m/d/Y H:i') . " - " . $end->format('m/d/Y H:i');
            }

            if ($start->month != $end->month || $start->day != $end->day)
            {
                return $start->format('m/d/Y H:i') . " - " . $end->format('m/d H:i');
            }

            return $start->format('m/d/Y H:i') . " - " . $end->format('H:i');
        });
    }
}