<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
/**
     * Scope a query to only include upcoming appointments.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpcoming($query)
    {
        $now = now();
        return $query->where('start_at', '>', $now);
    }
    
    public function customer()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function getDates()
    {
        return array('start_at', 'end_at', static::CREATED_AT, static::UPDATED_AT);
    }
}
