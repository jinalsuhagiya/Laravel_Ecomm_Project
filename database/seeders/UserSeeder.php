<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'admin'
        ]);

        $admin->assignRole('admin');

        
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'admin'
        ]);

        $manager->assignRole('manager');

        
        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 'admin'
        ]);

        $employee->assignRole('employee');
    }
}
