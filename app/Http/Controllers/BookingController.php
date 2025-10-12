<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     */
     
    public function create()
    {
        $carMakes = CarMake::orderBy('name')->get();
        
        // Fetch REAL services from the database
        $services = Service::orderBy('id', 'asc')->get();
        // Group them by the 'category' column
        $serviceCategories = $services->groupBy('category');

        // Pass the real data to the view
        return view('booking.create', [
            'carMakes' => $carMakes,
            'serviceCategories' => $serviceCategories
        ]);
    }
    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // 1. Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'make' => 'required|exists:car_makes,id',
            'model' => 'required|exists:car_models,id',
            'year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'booking_date' => 'required|date',
            'services' => 'required|array',
            'services.*' => 'exists:services,id', // Ensure every selected service exists
            'notes' => 'nullable|string',
        ]);
        
        // Use a database transaction to ensure all data is saved or none is.
        DB::beginTransaction();
        
        try {
            // Inside the store() method in BookingController.php

            // 2. Find or create the customer
            $customerQuery = Customer::query();

            // Prioritize finding by the required phone number
            $customerQuery->where('phone', $validated['phone']);

            // If an email was provided, also check for it
            if (!empty($validated['email'])) {
                $customerQuery->orWhere('email', $validated['email']);
            }

            $customer = $customerQuery->first();
            if ($customer) {
                // Customer found, update their info just in case
                $customer->update([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'] ?? $customer->email, // Keep old email if new one is empty
                    'address' => $validated['address']
                ]);
            } else {

                // No customer found, create a new one
                $customer = Customer::create([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address']
                ]);
            }


            // 3. Find or create the car for that customer
            $car = Car::firstOrCreate(
                [
                    'customer_id' => $customer->id,
                    'car_make_id' => $validated['make'],
                    'car_model_id' => $validated['model'],
                    'year' => $validated['year']
                ]
            );

            // 4. Create the booking record
            $booking = Booking::create([
                'customer_id' => $customer->id,
                'car_id' => $car->id,
                'booking_date' => $validated['booking_date'],
                'notes' => $validated['notes'],
                'type' => 'booking', // Set the type
                'status' => 'Pending', // Default status
            ]);

            // 5. Attach the selected services to the booking
            $servicesToAttach = [];
            $selectedServices = Service::find($validated['services']);

            foreach ($selectedServices as $service) {
                $servicesToAttach[$service->id] = ['price' => $service->price];
            }

            $booking->services()->attach($servicesToAttach);

            DB::commit(); // All good, save the changes

            return redirect()->route('booking.create')->with('success', 'Your appointment has been successfully booked! We will contact you shortly to confirm.');

        } catch (\Exception $e) {
            DB::rollBack(); // Something went wrong, undo the changes
            dd($e->getMessage()); 
            // Optional: Log the error message
            // Log::error('Booking failed: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }
}