<?php

use Illuminate\Database\Seeder;
use App\User;
use \App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

        $user = User::create([
            'name' => 'David',
            'email' => 'admin@email.com',
            'password' => '199244'
        ]);

        $role = Role::create([
            'name' => 'Admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);
        // for ($i=1; $5 < ; $i++) {

        // }
    }
}
