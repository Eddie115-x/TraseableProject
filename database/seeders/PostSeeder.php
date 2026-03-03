<?php

namespace Database\Seeders;

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
                'title' => 'Getting Started with Traseable',
                'content' => 'This is the first seeded post.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Seeded Post',
                'content' => 'More seeded content for testing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laravel + PostgreSQL Setup Notes',
                'content' => 'Connection and migration setup is complete.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
