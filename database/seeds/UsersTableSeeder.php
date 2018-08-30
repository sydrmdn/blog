<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = new User;
        $user_admin->name = 'Admin';
        $user_admin->email = 'admin@domain.com';
        $user_admin->password = bcrypt('123456');
        $user_admin->avatar = 'https://materializecss.com/images/yuna.jpg';
        $user_admin->slug = 'mr-admin';
        $user_admin->bio = '';
        $user_admin->twitter_url = '';
        $user_admin->facebook_url = '';
        $user_admin->save();

        $user_author = new User();
        $user_author->name = 'Author';
        $user_author->email = 'author@domain.com';
        $user_author->password = bcrypt('123456');
        $user_author->avatar = 'https://picturepan2.github.io/spectre/img/avatar-2.png';
        $user_author->slug = 'mr-author';
        $user_author->bio = '';
        $user_author->twitter_url = '';
        $user_author->facebook_url = '';
        $user_author->save();
    }
}
