<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting(['site-name' => config('app.name')])->save();
        setting(['admin-notify-text' => 'A new user has registered.'])->save();
        setting(['timezone' => '+12:00'])->save();
        setting(['short-date-format' => '/d/m/Y'])->save();
        setting(['long-date-format' => 'l, F d Y'])->save();
        setting(['12-hour-time' => 'on'])->save();
    }
}
