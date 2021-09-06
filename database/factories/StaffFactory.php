<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\StaffType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = StaffType::where('status',1)->pluck('id')->toArray();
        $uid = ['nid','birth'];
        $bodY = ['18','19','20','21','22','23','24','25'];
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'uid' => $uid[array_rand($uid)],
            'uid_type' =>$this->faker->randomNumber(8),
            'dob' => Carbon::now()->parse(),
            'join_date' =>Carbon::now()->subYear($bodY[array_rand($bodY)])->parse(),
            'staf_type_id' => $types[array_rand($types)],
            'description' => $this->faker->realText(rand(10,20)),
            'status' => 1,
        ];
    }
}
