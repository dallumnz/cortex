<?php

namespace Database\Seeders;

use App\Models\PostArticle;
use Illuminate\Database\Seeder;

class CreateArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostArticle::insert(
            [
                'post_id' => 1,
                'content' => 'To get started, you will need to login as an Admin user. These details have been sent to you.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
