<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Para rodar esta seeder especificamente
     * php artisan db:seed --class=Database\Seeders\Blog\CommentSeeder
     */
    public function run(): void
    {
        Comment::factory(20)->create();
    }
}
