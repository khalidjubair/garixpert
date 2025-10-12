<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $guarded = [];

    public function make()
    {
        return $this->belongsTo(CarMake::class, 'car_make_id');
    }
}
