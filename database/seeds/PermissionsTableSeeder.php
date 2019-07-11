<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-07-11 07:32:09',
            'updated_at' => '2019-07-11 07:32:09',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '17',
                'title'      => 'portfolio_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '18',
                'title'      => 'portfolio_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '19',
                'title'      => 'portfolio_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '20',
                'title'      => 'portfolio_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '21',
                'title'      => 'portfolio_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '22',
                'title'      => 'client_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '23',
                'title'      => 'client_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '24',
                'title'      => 'client_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '25',
                'title'      => 'client_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '26',
                'title'      => 'client_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '27',
                'title'      => 'staff_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '28',
                'title'      => 'staff_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '29',
                'title'      => 'staff_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '30',
                'title'      => 'staff_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '31',
                'title'      => 'staff_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '32',
                'title'      => 'service_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '33',
                'title'      => 'service_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '34',
                'title'      => 'service_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '35',
                'title'      => 'service_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '36',
                'title'      => 'service_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '37',
                'title'      => 'contact_info_create',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '38',
                'title'      => 'contact_info_edit',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '39',
                'title'      => 'contact_info_show',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '40',
                'title'      => 'contact_info_delete',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ],
            [
                'id'         => '41',
                'title'      => 'contact_info_access',
                'created_at' => '2019-07-11 07:32:09',
                'updated_at' => '2019-07-11 07:32:09',
            ]];

        Permission::insert($permissions);
    }
}
