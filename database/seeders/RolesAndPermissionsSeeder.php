<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        $permissionViewDashboard = Permission::create(['name' => 'view dashboard']);
        $permissionManageUsers = Permission::create(['name' => 'manage users']);

        $roleAdmin->givePermissionTo([$permissionViewDashboard, $permissionManageUsers]);
        $roleUser->givePermissionTo($permissionViewDashboard);
    }
}

