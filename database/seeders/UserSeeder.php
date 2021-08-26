<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $permission_list = ['admin','editor','user'];
        foreach($permission_list as $pm){
        Permission::create([
            'permission_name'=>$pm
            ]);
        $role = Role::create([
            'role_name'=> $pm
        ]);
        }
        $user = User::create([
            'name' => 'Admin',
            'email'=>'admin@example.com',
            'password'=>hash::make('admin'),
            'role_id'=>$role->id
        ]);

    }
}
