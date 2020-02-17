<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getDates()
    {
        return array(static::CREATED_AT, static::UPDATED_AT);
    }
}
