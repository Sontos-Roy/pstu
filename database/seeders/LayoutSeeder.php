<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('layouts')->insert([
            ['name' => 'Home Page'],
            ['name' => 'Faculty Page'],
            ['name' => 'Department Page'],
        ]);
    }
}
