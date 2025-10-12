<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Clear the table first to avoid duplicates on re-seed
        // DB::table('services')->truncate();

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear the table
        Service::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $services = [
            // Car Wash
            ['name' => 'Standard Exterior Wash', 'category' => 'Car Wash', 'price' => 0.00],
            ['name' => 'Full Interior & Exterior Detailing', 'category' => 'Car Wash', 'price' => 0.00],
            
            // Basic Maintenance
            ['name' => 'Oil & Filter Change', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Air Filter Replacement', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Cabin Air Filter Replacement', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Wiper Blade Replacement', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Fluid Top-up', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Battery Health Check', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Full Tune-up', 'category' => 'Basic Maintenance', 'price' => 0.00],
            ['name' => 'Scheduled Mileage Service', 'category' => 'Basic Maintenance', 'price' => 0.00],

            // General Repair & Diagnostics
            ['name' => 'Engine Diagnostics', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Brake Inspection & Repair', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'AC System Check & Recharge', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Suspension & Steering Repair', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Exhaust System Repair', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Electrical System Diagnosis', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Headlight & Taillight Replacement', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
            ['name' => 'Pre-purchase Inspection', 'category' => 'General Repair & Diagnostics', 'price' => 0.00],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}