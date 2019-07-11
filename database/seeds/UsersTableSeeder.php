<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$SAlPZBATiDIGVR3kO5LRK.r7Fq7I4p5nSH25xqdPVmTcbgsrHh.HW',
            'remember_token' => null,
            'created_at'     => '2019-07-11 07:29:02',
            'updated_at'     => '2019-07-11 07:29:02',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
