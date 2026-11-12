<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'title' => 'Getting Started with Laravel',
                'content' => 'Laravel is a powerful PHP framework for web development.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Understanding PHP',
                'content' => 'PHP is a server-side programming language.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Learning MySQL',
                'content' => 'MySQL is a relational database management system.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Introduction to HTML',
                'content' => 'HTML is used to structure web pages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'CSS for Beginners',
                'content' => 'CSS is used to style and design websites.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'JavaScript Basics',
                'content' => 'JavaScript makes websites interactive.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'title' => 'Understanding API',
                'content' => 'API allows different applications to communicate.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'title' => 'What is REST API?',
                'content' => 'REST API is an architectural style for web services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'title' => 'Learning Eloquent ORM',
                'content' => 'Eloquent ORM makes database interactions easier in Laravel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'title' => 'Laravel Relationships',
                'content' => 'Laravel relationships connect data between database tables.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
