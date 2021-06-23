<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = 
        [
            [
            "id"=> 1,
            "name"=> "Vegetable",
            "slug"=> "vegetable",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>22=>28",
            "updated_at"=> "2021-05-27 06=>22=>28"
            ],
            [
            "id"=> 2,
            "name"=> "First Food",
            "slug"=> "first-food",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>27=>33",
            "updated_at"=> "2021-05-27 06=>27=>33"
            ],
            [
            "id"=> 3,
            "name"=> "Chicken",
            "slug"=> "chicken",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>27=>43",
            "updated_at"=> "2021-05-27 06=>27=>43"
            ],
            [
            "id"=> 4,
            "name"=> "Mutton",
            "slug"=> "mutton",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>27=>52",
            "updated_at"=> "2021-05-27 06=>27=>52"
            ],
            [
            "id"=> 5,
            "name"=> "Fish/Prawn",
            "slug"=> "fishprawn",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>28=>02",
            "updated_at"=> "2021-05-27 06=>28=>02"
            ],
            [
            "id"=> 6,
            "name"=> "Beef",
            "slug"=> "beef",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>29=>36",
            "updated_at"=> "2021-05-27 06=>29=>36"
            ],
            [
            "id"=> 7,
            "name"=> "Beverages",
            "slug"=> "beverages",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>29=>48",
            "updated_at"=> "2021-05-27 06=>29=>48"
            ],
            [
            "id"=> 8,
            "name"=> "Appetizers",
            "slug"=> "appetizers",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>29=>56",
            "updated_at"=> "2021-05-27 06=>29=>56"
            ],
            [
            "id"=> 9,
            "name"=> "Rice",
            "slug"=> "rice",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>30=>01",
            "updated_at"=> "2021-05-27 06=>30=>01"
            ],
            [
            "id"=> 10,
            "name"=> "Soup",
            "slug"=> "soup",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>30=>07",
            "updated_at"=> "2021-05-27 06=>30=>07"
            ],
            [
            "id"=> 11,
            "name"=> "Noodles/Pasta",
            "slug"=> "noodlespasta",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>30=>13",
            "updated_at"=> "2021-05-27 06=>30=>13"
            ],
            [
            "id"=> 12,
            "name"=> "Salad",
            "slug"=> "salad",
            "icon"=> null,
            "image"=> null,
            "text_1"=> "undefined",
            "text_2"=> null,
            "status"=> 1,
            "parent_id"=> null,
            "admin_id"=> 1,
            "created_at"=> "2021-05-27 06=>30=>19",
            "updated_at"=> "2021-05-27 06=>30=>19"
            ]
        ];
       // DB::table('categories')->delete();
        foreach ($data as $key => $value) {
            $chack = Category::where('slug',$value['slug'])->first();
            if ($chack==null) {
                $category = new Category;
                $category->name = $value['name'];
                $category->slug = $value['slug'];
                $category->status = $value['status'];
                $category->save();
            }
           
        }
    }
}
