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
        $user_administrator->avatar = 'https://materializecss.com/images/yuna.jpg';
        $user_administrator->slug = 'mr-administrator';
        $user_administrator->bio = '';
        $user_administrator->twitter_url = '';
        $user_administrator->facebook_url = '';
        $user_administrator->save();
        $user_administrator->roles()->attach($role_administrator);

        $user_author = new User();
        $user_author->name = 'Mr. Author';
        $user_author->email = 'author@domain.com';
        $user_author->password = bcrypt('123456');
        $user_author->avatar = 'https://picturepan2.github.io/spectre/img/avatar-2.png';
        $user_author->slug = 'mr-author';
        $user_author->bio = '';
        $user_author->twitter_url = '';
        $user_author->facebook_url = '';
        $user_author->save();
        $user_author->roles()->attach($role_author);
    }
}
