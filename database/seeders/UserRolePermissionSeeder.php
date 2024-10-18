<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role_staff = Role::create(['name'=>'staff']);
        $role_it = Role::create(['name'=>'it']);
        $role_owner = Role::create(['name'=>'owner']);

        $Nadine = User::create([
            'Nama_User' => 'Nadine Abigail',
            'Username' => 'Nadine',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'wa' => '08123456789',
            'role_id' => 2,
            'CREATED_BY' => 'Artha',
            'UPDATE_BY' => 'Artha'
        ]);

        $Artha = User::create([
            'Nama_User' => 'Artha Gandhi',
            'Username' => 'Artha',
            'email' => 'Arumifathina@gmail.com',
            'password' => Hash::make('Arthaganteng#1'),
            'remember_token' => Str::random(10),
            'wa' => '082198150200',
            'role_id' => 2,
            'CREATED_BY' => 'Artha',
            'UPDATE_BY' => 'Artha'
        ]);


        $permission = Permissions::create(['name'=>'read register']);
        $permission = Permissions::create(['name'=>'read configuration']);
        $permission = Permissions::create(['name'=>'read updatemember']);
        $permission = Permissions::create(['name'=>'read registeritem']);
        $permission = Permissions::create(['name'=>'read document']);
        $permission = Permissions::create(['name'=>'read activity']);
        $permission = Permissions::create(['name'=>'read errorlog']);
        $permission = Permissions::create(['name'=>'read transaction']);
        $permission = Permissions::create(['name'=>'read cashier']);
        $permission = Permissions::create(['name'=>'read invoice']);
        $permission = Permissions::create(['name'=>'read addstock']);
        $permission = Permissions::create(['name'=>'read buy']);
        $permission = Permissions::create(['name'=>'read access']);

        $role_owner->givePermissionTo('read register');
        $role_owner->givePermissionTo('read configuration');
        $role_owner->givePermissionTo('read updatemember');
        $role_owner->givePermissionTo('read registeritem');
        $role_owner->givePermissionTo('read document');
 

        $role_it->givePermissionTo('read register');
        $role_it->givePermissionTo('read configuration');
        $role_it->givePermissionTo('read updatemember');
        $role_it->givePermissionTo('read registeritem');
        $role_it->givePermissionTo('read document');
        $role_it->givePermissionTo('read activity');
        $role_it->givePermissionTo('read errorlog');
        $role_it->givePermissionTo('read transaction');
        $role_it->givePermissionTo('read cashier');
        $role_it->givePermissionTo('read invoice');
        $role_it->givePermissionTo('read addstock');
        $role_it->givePermissionTo('read access');

        $role_staff->givePermissionTo('read configuration');
        $role_staff->givePermissionTo('read registeritem');

        
    }
}
