<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Marca::factory(10)->create();
        \App\Models\Produto::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'test',
        //     'email' => 'um@um.com',
        //     'password' => 'admin',
        // ]);

        // para iniciar o seeder
        // php artisan db:seed
        // php artisan db:seed --class=UserSeeder
    }
}
