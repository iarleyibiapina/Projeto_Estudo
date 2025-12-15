<?php

namespace Database\Factories\Blog;

use App\Models\User;
use File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = public_path('images/posts/');

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
        $thumbnail = $this->faker->image($path, 640, 480, null, false);

        $title = $this->faker->sentence(3);
        return [
            "user_id"   => User::factory(),
            "title"     => $title,
            "slug"      => Str::slug($title),
            // "thumbnail" => "/images/posts/" . $thumbnail,
            "thumbnail" => $this->faker->image($path, 640, 480, null, false),
            "content"   => $this->faker->paragraph(),
        ];
    }
}
