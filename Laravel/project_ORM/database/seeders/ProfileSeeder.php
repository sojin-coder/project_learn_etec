<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
       

        DB::table('profiles')->insert([
            ['user_id' => 1, 'phone' => '012345678', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'phone' => '012345679', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'phone' => '012345680', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'phone' => '012345681', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'phone' => '012345682', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'phone' => '012345683', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 7, 'phone' => '012345684', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 8, 'phone' => '012345685', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 9, 'phone' => '012345686', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 10, 'phone' => '012345687', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
