<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'admin.user.index'])->assignRole($role1);

        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$role1, $role2]);
    }
}
