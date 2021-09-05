<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'কাচা বাজার',
            'মুদি বাজর',
            'মাছ',
            'মাংস',
            'ডিম',
            'চাইনিজ সস',
            'বেভারেজ',
            'জ্বালানি',
        ];

        foreach($data as $key => $row){
            Type::create([
                'name'=>$row,
                'status'=>1,
                'user_id'=>1,
                ]
            );
        }
    }
}
