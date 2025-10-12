<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CarMake;
use App\Models\CarModel;

class CarDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to avoid duplicates
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CarMake::truncate();
        CarModel::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $makes = [
            // Japanese Brands
            'Toyota' => ['Corolla', 'Allion', 'Premio', 'Axio', 'Noah', 'Voxy', 'RAV4', 'Hilux', 'Prado', 'Land Cruiser'],
            'Honda' => ['Civic', 'Accord', 'Vezel', 'CR-V', 'Grace', 'City'],
            'Nissan' => ['Sunny', 'Almera', 'X-Trail', 'Navara', 'Patrol'],
            'Mitsubishi' => ['Lancer', 'Outlander', 'Pajero', 'Xpander'],
            'Suzuki' => ['Swift', 'Alto', 'Celerio', 'Ertiga', 'Vitara'],
            
            // Korean Brands
            'Hyundai' => ['Elantra', 'Sonata', 'Tucson', 'Santa Fe', 'Creta', 'Accent'],
            'Kia' => ['Sportage', 'Seltos', 'Sonet', 'Picanto', 'Cerato'],

            // Chinese Brands
            'BYD' => ['Seal', 'Dolphin', 'Atto 3'],
            'Cherry' => ['Tiggo 4 Pro', 'Tiggo 7 Pro', 'Tiggo 8 Pro'],
            'Haval' => ['H6', 'Jolion'],
            'MG' => ['MG ZS', 'MG HS', 'MG 3', 'MG 5'],
            
            // European Brands
            'BMW' => ['3 Series', '5 Series', '7 Series', 'X1', 'X3', 'X5'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'S-Class', 'GLA', 'GLC'],
            'Audi' => ['A4', 'A6', 'Q3', 'Q5', 'Q7'],
            
            // Other Brands
            'Ford' => ['Ranger', 'Everest'],
            'Proton' => ['Saga', 'X50', 'X70'],
            'Tata' => ['Nexon', 'Tiago', 'Harrier'],
        ];

        foreach ($makes as $makeName => $models) {
            $make = CarMake::create(['name' => $makeName]);

            foreach ($models as $modelName) {
                CarModel::create([
                    'car_make_id' => $make->id,
                    'name' => $modelName
                ]);
            }
        }
    }
}