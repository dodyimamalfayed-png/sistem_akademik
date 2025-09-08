<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
{
    $users = \App\Models\User::all();

    foreach ($users as $user) {
        \App\Models\Post::factory()->count(2)->create([
            'user_id' => $user->id,
        ]);
    }
}

}

