<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [[
            'id'         => 1,
            'title'      => 'Admin',
            'created_at' => '2019-07-11 07:15:31',
            'updated_at' => '2019-07-11 07:15:31',
            'deleted_at' => null,
        ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-07-11 07:15:31',
                'updated_at' => '2019-07-11 07:15:31',
                'deleted_at' => null,
            ]];

        Role::insert($roles);
    }
}
