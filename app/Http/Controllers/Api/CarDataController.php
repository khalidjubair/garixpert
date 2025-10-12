<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarDataController extends Controller
{
    /**
     * Fetch car models based on the selected make ID.
     */
    public function getModels($car_make_id)
    {
        $models = CarModel::where('car_make_id', $car_make_id)->get();
        
        return response()->json($models);
    }
}