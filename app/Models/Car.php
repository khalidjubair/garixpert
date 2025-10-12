<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() { return $this->belongsTo(Customer::class); }
    
    // CORRECTED RELATIONSHIPS
    public function make() { return $this->belongsTo(CarMake::class, 'car_make_id'); }
    public function model() { return $this->belongsTo(CarModel::class, 'car_model_id'); }
}