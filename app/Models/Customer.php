<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cars() { return $this->hasMany(Car::class); }
    public function bookings() { return $this->hasMany(Booking::class); }
}