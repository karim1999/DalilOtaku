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

        Permission::create(['name' => 'access ban']);

        Permission::create(['name' => 'access animes']);
        Permission::create(['name' => 'edit animes']);
        Permission::create(['name' => 'ban animes']);
        Permission::create(['name' => 'unban animes']);

        Permission::create(['name' => 'access genres']);
        Permission::create(['name' => 'edit genres']);
        Permission::create(['name' => 'ban genres']);
        Permission::create(['name' => 'unban genres']);

        Permission::create(['name' => 'access studios']);
        Permission::create(['name' => 'edit studios']);
        Permission::create(['name' => 'delete studios']);

        Permission::create(['name' => 'access sources']);
        Permission::create(['name' => 'add sources']);
        Permission::create(['name' => 'edit sources']);
        Permission::create(['name' => 'delete sources']);

        Permission::create(['name' => 'access users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'access roles']);
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'welcome']);
        Permission::create(['name' => 'policy']);
        Permission::create(['name' => 'terms']);

        Permission::create(['name' => 'access questions']);
        Permission::create(['name' => 'add questions']);
        Permission::create(['name' => 'edit questions']);
        Permission::create(['name' => 'delete questions']);

        Permission::create(['name' => 'settings']);
//        Permission::create(['name' => 'scripts']);



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
