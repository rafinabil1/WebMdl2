<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'image' => 'example.png',
            'title' => 'Belajar Laravel',
            'content' => 'Ini adalah konten pertama saya menggunakan Laravel.',
        ]);
    }
}
