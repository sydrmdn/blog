<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name', 'administrator')->first();
        $role_author  = Role::where('name', 'author')->first();

        $user_administrator = new User;
        $user_administrator->name = 'Mr. Administrator';
        $user_administrator->email = 'admin@domain.com';
        $user_administrator->password = bcrypt('123456');
        $user_administrator->save();
        $user_administrator->roles()->attach($role_administrator);

        $user_author = new User();
        $user_author->name = 'Mr. Author';
        $user_author->email = 'author@domain.com';
        $user_author->password = bcrypt('123456');
        $user_author->save();
        $user_author->roles()->attach($role_author);
    }
}
