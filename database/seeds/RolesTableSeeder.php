<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employee
        $role_administrator = new Role();
        $role_administrator->name = 'administrator';
        $role_administrator->save();

        // Manager
        $role_author = new Role();
        $role_author->name = 'author';
        $role_author->save();
    }
}
