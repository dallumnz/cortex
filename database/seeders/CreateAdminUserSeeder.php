<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'dallum.brown@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('grx90av'),
            'status' => 1,
            'is_admin' => 1,
        ]);
    }
}
