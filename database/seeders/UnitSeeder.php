<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'mg','gm','kg','ml','litter','dozen','bundell','piece',
        ];

        foreach($data as $key => $row){
            Unit::create([
                'name'=>$row,
                'status'=>1,
                'user_id'=>1,
                ]
            );
        }
    }
}
