<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Blank',
            'slug' => 'blank',
            'description' => 'Blank category',
        ]);
        Category::create([
            'name' => 'Getting Started',
            'slug' => 'getting-started',
            'description' => 'Getting started with Cortex',
        ]);
    }
}
