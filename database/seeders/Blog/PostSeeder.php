<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Para rodar esta seeder especificamente
     * php artisan db:seed --class=Database\Seeders\Blog\PostSeeder
     */
    public function run(): void
    {
        Post::factory(20)->create();
    }
}
