<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        $types = Type::where('status',1)->pluck('id')->toArray();
        $units = Unit::where('status',1)->pluck('id')->toArray();
        $food = [];
        $food[0] = $this->faker->foodName();
        $food[1] = $this->faker->beverageName();
        $food[2] = $this->faker->dairyName();
        $food[3] = $this->faker->vegetableName();
        $food[4] = $this->faker->fruitName();
        $food[5] = $this->faker->sauceName();
        $name = $food[array_rand($food)];
        $purchase_price = $this->faker->randomNumber(2);
        return [
            'name' => $name,
            'type_id' => $types[array_rand($types)],
            'slug' => Str::slug($name),
            'sku' => $this->faker->unique()->ean8(),
            'description' => $this->faker->realText(rand(80,150)),
            'purchase_price' => $purchase_price,
            'selling_price' => $purchase_price+50,
            'unit_id' => $units[array_rand($units)],
            'status' => 1,
        ];
    }
}
