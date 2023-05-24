<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 2,
                'name' => 'manage_role',
                'group_name' => 'adminstrator',
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'manage_permission',
                'group_name' => 'adminstrator',
                'guard_name' => 'web',
            ],
            [
                'id' => 4,
                'name' => 'manage_user',
                'group_name' => 'adminstrator',
                'guard_name' => 'web',
            ],
            [
                'id' => 5,
                'name' => 'manage_sales',
                'group_name' => 'adminstrator',
                'guard_name' => 'web',
            ],
            [
                'id' => 6,
                'name' => 'manage_projects',
                'group_name' => 'adminstrator',
                'guard_name' => 'web',
            ],
        ]);
    }
}
