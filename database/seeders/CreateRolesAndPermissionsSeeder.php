<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
         $adminRole = Role::create(['name' => 'admin']);
         $teacherRole = Role::create(['name' => 'teacher']);

         // Create permissions
         Permission::create(['name' => 'access admin area']);

         // Assign permissions to roles
         $adminRole->givePermissionTo('access admin area');
    }
}
