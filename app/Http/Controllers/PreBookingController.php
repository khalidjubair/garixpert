<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class PreBookingController extends Controller
{
    /**
     * Show the pre-booking form.
     */
    public function create()
    {
        $carMakes = CarMake::orderBy('name')->get();
        
        return view('pre-booking.create', [
            'carMakes' => $carMakes
        ]);
    }

    /**
     * Store the pre-booking request.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'make' => 'required|exists:car_makes,id',
            'model' => 'required|exists:car_models,id',
            'year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'services' => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            // 2. Find or create the customer by phone or email
            $customerQuery = Customer::query()->where('phone', $validated['phone']);
            if (!empty($validated['email'])) {
                $customerQuery->orWhere('email', $validated['email']);
            }
            $customer = $customerQuery->first();

            if ($customer) {
                $customer->update(['name' => $validated['name']]);
            } else {
                $customer = Customer::create([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                ]);
            }

            // 3. Find or create the car record
            $car = Car::firstOrCreate([
                'customer_id' => $customer->id,
                'car_make_id' => $validated['make'],
                'car_model_id' => $validated['model'],
                'year' => $validated['year']
            ]);

            // 4. Create the booking record with type 'pre-booking'
            Booking::create([
                'customer_id' => $customer->id,
                'car_id' => $car->id,
                'booking_date' => now(), // Use current time as a placeholder
                'type' => 'pre-booking',
                'status' => 'Pending',
                'notes' => 'Pre-booking interest in: ' . implode(', ', $request->input('services', [])),
            ]);

            DB::commit();

            return redirect()->route('prebooking.create')->with('success', 'We have received your request and will call you back shortly!');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage()); 
            // Optional: Log the error message
            // Log::error('Pre-Booking failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }
}