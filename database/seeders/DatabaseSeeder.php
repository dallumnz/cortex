<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CreateSettingsSeeder::class);
        $this->call(CreateCategoriesSeeder::class);
        $this->call(CreateSubcategoriesSeeder::class);
        $this->call(CreatePostSeeder::class);
        $this->call(CreateArticleSeeder::class);
    }
}
