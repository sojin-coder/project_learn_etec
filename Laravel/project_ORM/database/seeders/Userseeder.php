<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Smith', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'David Lee', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sarah Johnson', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Michael Brown', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Emma Wilson', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'James Taylor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sophia Martin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Daniel Anderson', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Olivia Thomas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'William Garcia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
