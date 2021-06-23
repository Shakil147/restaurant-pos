<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'dashboard',

            'categories-index',
            'categories-create',
            'categories-show',
            'categories-update',
            'categories-destroy',
            
            'products-index',
            'products-create',
            'products-show',
            'products-update',
            'products-destroy',
            
            'sliders-index',
            'sliders-create',
            'sliders-show',
            'sliders-update',
            'sliders-destroy',
            
            'orders-index',
            'orders-create',
            'orders-show',
            'orders-update',
            'orders-destroy',
            
            'reviews-index',
            'reviews-create',
            'reviews-show',
            'reviews-update',
            'reviews-destroy',
            
            'customers-index',
            'customers-create',
            'customers-show',
            'customers-update',
            'customers-destroy',
            
            'website-index',
            'website-create',
            'website-show',
            'website-update',
            'website-destroy',
            
            'admins-index',
            'admins-create',
            'admins-show',
            'admins-update',
            'admins-destroy',

            'roles-index',
            'roles-create',
            'roles-show',
            'roles-update',
            'roles-destroy',
        ];

        Permission::delete();
        DB::table('role_has_permissions')->delete();
        foreach ($permissions as $permission) {
            $check = Permission::where('name',$permission)->first();
            if ($check==null) {
                Permission::create(['name' => $permission]);
            }            
        }

    }
}
