<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    protected $guarded = [];

    public function models()
    {
        // assumes car_models table with car_make_id FK
        return $this->hasMany(CarModel::class);
    }
}
