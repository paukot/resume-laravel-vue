<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com',],
            User::factory()->make()
                ->except(['profile_photo_url'])->toArray()
        );

    }
}
