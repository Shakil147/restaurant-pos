<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [

            'super-admin',
            'admin',
            'moderator',
            'new',
        ];


        foreach ($roles as $role) {
            $check = Role::where('name',$role)->first();
            if ($check==null) {
                Role::create(['name' => $role]);
            }            
        }
        $user = User::where('email','shakil@admin.com')->first();
        $user->assignRole('super-admin');

        
        // $permissions = [

        //     'dashboard',

        //     'categories-index',
        //     'categories-create',
        //     'categories-show',
        //     'categories-update',
        //     'categories-destroy',
            
        //     'products-index',
        //     'products-create',
        //     'products-show',
        //     'products-update',
        //     'products-destroy',
            
        //     'sliders-index',
        //     'sliders-create',
        //     'sliders-show',
        //     'sliders-update',
        //     'sliders-destroy',
            
        //     'orders-index',
        //     'orders-create',
        //     'orders-show',
        //     'orders-update',
        //     'orders-destroy',
            
        //     'reviews-index',
        //     'reviews-create',
        //     'reviews-show',
        //     'reviews-update',
        //     'reviews-destroy',
            
        //     'customers-index',
        //     'customers-create',
        //     'customers-show',
        //     'customers-update',
        //     'customers-destroy',
            
        //     'website-index',
        //     'website-create',
        //     'website-show',
        //     'website-update',
        //     'website-destroy',
            
        //     'admins-index',
        //     'admins-create',
        //     'admins-show',
        //     'admins-update',
        //     'admins-destroy',

        //     'roles-index',
        //     'roles-create',
        //     'roles-show',
        //     'roles-update',
        //     'roles-destroy',
        // ];

        // $role = Role::where('name','admin')->first();
        // $role->syncPermissions($permissions);

    }
}
