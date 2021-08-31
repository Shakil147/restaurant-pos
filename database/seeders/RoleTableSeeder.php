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

        
        $permissions = [

            'dashboard',
            'pos',
            'orders',
            'web-infos',

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

        $role = Role::where('name','admin')->first();
        $role->syncPermissions($permissions);

    }
}
