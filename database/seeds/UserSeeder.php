<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Permissions
        Permission::create(['name' => 'access admin']);


        //Create Roles
        Role::create(['name' => 'user']);

        $super_admin = Role::create(['name' => 'super-admin']);
        $super_admin->givePermissionTo(Permission::all());

        $user= User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'email_verified_at'=> date("Y-m-d H:i:s"),
        ]);
        $user->assignRole('super-admin');
    }
}
