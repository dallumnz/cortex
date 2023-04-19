<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class CreatePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert(
            [
                'slug' => 'welcome-to-cortex',
                'title' => 'Welcome to Cortex',
                'description' => 'Cortex is a news and blog app in development by dalbro.',
                'keywords' => 'cortex, web app, news, blog',
                'tags' => 'cortex, dalbro',
                'status' => 1,
                'visibility' => 1,
                'featured' => 1,
                'breaking' => 0,
                'recommended' => 0,
                'headline' => 0,
                'post_type' => 1,
                'category_id' => 2,
                'subcategory_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
