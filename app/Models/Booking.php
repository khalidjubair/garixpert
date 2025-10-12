<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() { return $this->belongsTo(Customer::class); }
    public function car() { return $this->belongsTo(Car::class); }
    public function services() { return $this->belongsToMany(Service::class, 'booking_service'); }
}