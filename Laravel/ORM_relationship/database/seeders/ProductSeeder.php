<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone 16 Pro',
                'price' => 999.00,
                'qty' => 10,
                'image' => 'iphone16.jpg',
                'description' => 'Apple iPhone 16 Pro 256GB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung Galaxy S25',
                'price' => 899.00,
                'qty' => 15,
                'image' => 'samsung-s25.jpg',
                'description' => 'Samsung Galaxy S25 256GB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MacBook Air M4',
                'price' => 1199.00,
                'qty' => 8,
                'image' => 'macbook-air.jpg',
                'description' => 'Apple MacBook Air M4 16GB RAM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'iPad Air M3',
                'price' => 599.00,
                'qty' => 20,
                'image' => 'ipad-air.jpg',
                'description' => 'Apple iPad Air M3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AirPods Pro 2',
                'price' => 249.00,
                'qty' => 30,
                'image' => 'airpods-pro.jpg',
                'description' => 'Apple AirPods Pro 2nd Generation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
