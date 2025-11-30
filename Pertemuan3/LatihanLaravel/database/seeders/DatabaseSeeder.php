<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 10 User secara manual dengan username user1-user10
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'), // Gunakan bcrypt untuk meng-hash password
            ]);
        }

        // Membuat 2 Category secara otomatis
        Category::factory()->count(2)->create();

        // Membuat Post secara otomatis
        Post::factory(10)->recycle(User::all())->recycle(Category::all())->create();
    }
}
