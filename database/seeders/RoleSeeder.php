<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminGudangRole = Role::create(['name' => 'admin_gudang']);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $adminPenjualanRole = Role::create(['name' => 'admin_penjualan']);
        $userRole = Role::create(['name' => 'manager']);

        $superAdminRole->givePermissionTo('all');
    }
}
