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
        \App\Models\User::factory()->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'password'=> bcrypt('admin123'),
        ]);

        foreach(\App\Models\User::factory(10)->create() as $user){
            \App\Models\Post::factory(2)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}