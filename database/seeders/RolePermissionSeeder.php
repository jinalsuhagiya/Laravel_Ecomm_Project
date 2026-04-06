<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'category.view']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.edit']);
        Permission::create(['name' => 'category.delete']);
 
       $admin = Role::create(['name' => 'admin']);
       $manager = Role::create(['name' => 'manager']);
       $employee = Role::create(['name' => 'employee']);

        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'category.view',
            'category.create',
            'category.edit'
        ]);

        $employee->givePermissionTo([
            'category.view'
        ]);
    }
}
