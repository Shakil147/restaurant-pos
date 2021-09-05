<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StaffType;

class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'General Manager',
            'Assistant Manager',
            'Executive Chef',
            'Sous Chef',
            'Pastry Chef',
            'Kitchen Manager',
            'Food & Beverage Manager',
            'Line Cook',
            'Fast Food Cook',
            'Short Order Cook',
            'Prep cook',
            'Sommelier',
            'Server',
            'Runner',
            'Busser/Bus person',
            'Host/Hostess',
            'Bartender',
            'Barback',
            'Barista',
            'Drive-thru Operator',
            'Cashier',
            'Dishwasher',
            'Driver',
            'Guard',
        ];
        foreach ($data as $key => $value) {
            StaffType::create(['name'=>$value,'status'=>1]);
        }
        
    }
}
