<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'iPhone 16',
                'price' => 899.99,
                'qty' => 10,
                'description' => 'Apple smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Samsung Galaxy S25',
                'price' => 799.99,
                'qty' => 15,
                'description' => 'Samsung smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'MacBook Air M4',
                'price' => 1199.99,
                'qty' => 5,
                'description' => 'Apple laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'iPad Pro M4',
                'price' => 999.99,
                'qty' => 8,
                'description' => 'Apple tablet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dell XPS 15',
                'price' => 1499.99,
                'qty' => 6,
                'description' => 'Dell laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AirPods Pro 2',
                'price' => 249.99,
                'qty' => 20,
                'description' => 'Wireless earbuds',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Samsung Galaxy Tab S10',
                'price' => 699.99,
                'qty' => 12,
                'description' => 'Samsung tablet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Apple Watch Series 10',
                'price' => 399.99,
                'qty' => 9,
                'description' => 'Apple smartwatch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'iPhone 15 Pro',
                'price' => 999.99,
                'qty' => 7,
                'description' => 'Apple smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Samsung Galaxy S24 Ultra',
                'price' => 1099.99,
                'qty' => 10,
                'description' => 'Samsung flagship smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'MacBook Pro M4',
                'price' => 1999.99,
                'qty' => 4,
                'description' => 'Apple professional laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dell Inspiron 15',
                'price' => 699.99,
                'qty' => 12,
                'description' => 'Dell everyday laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'HP Pavilion 15',
                'price' => 749.99,
                'qty' => 8,
                'description' => 'HP laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lenovo ThinkPad X1',
                'price' => 1399.99,
                'qty' => 6,
                'description' => 'Lenovo business laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sony WH-1000XM5',
                'price' => 349.99,
                'qty' => 15,
                'description' => 'Sony wireless headphones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Logitech MX Master 3S',
                'price' => 99.99,
                'qty' => 20,
                'description' => 'Wireless computer mouse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Samsung 27-inch Monitor',
                'price' => 299.99,
                'qty' => 9,
                'description' => 'Samsung computer monitor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ASUS ROG Strix G16',
                'price' => 1599.99,
                'qty' => 5,
                'description' => 'ASUS gaming laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Google Pixel 9 Pro',
                'price' => 999.99,
                'qty' => 11,
                'description' => 'Google Android smartphone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Anker Power Bank 20000mAh',
                'price' => 59.99,
                'qty' => 25,
                'description' => 'Portable power bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
