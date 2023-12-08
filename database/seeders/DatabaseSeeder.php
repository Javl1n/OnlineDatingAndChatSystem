<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Storage::deleteDirectory('media');
        Storage::deleteDirectory('avatar');
        Storage::deleteDirectory('verification');

        // User::factory()->create([
        //     'name' => 'Cherry Ann Soberano',
        //     'email' => 'cherryannsoberano@gmail.com',
        //     'password'=> bcrypt('admin1234'),
        // ]);
        // User::factory()->create([
        //     'name' => 'Kryz John F. Luceño',
        //     'email' => 'kryzjohn24@gmail.com',
        //     'password'=> bcrypt('kryzjohn123'),
        // ]);
        // User::factory()->create([
        //     'name' => 'Ferdinand L. Cabigting Jr.',
        //     'email' => 'cabigtingsam@gmail.com',
        //     'password'=> bcrypt('User12345'),
        // ]);
        // User::factory(10)->create();
        // User::all()->map(
        //     function ($user) {
        //          \App\Models\Post::factory(2)->create([
        //             'user_id' => $user->id,
        //          ]);
        //     }
        // );
        Tag::factory()->create([
            'name' => 'Guitar'
        ]);
        
        Tag::factory()->create([
            'name' => 'Music'
        ]);

        Tag::factory()->create([
            'name' => 'Art'
        ]);

        Tag::factory()->create([
            'name' => 'Robots'
        ]);
        
        Tag::factory()->create([
            'name' => 'Anime'
        ]);

        Tag::factory()->create([
            'name' => 'Basketball'
        ]);

        Tag::factory()->create([
            'name' => 'Baseball'
        ]);

        Tag::factory()->create([
            'name' => 'Volley Ball'
        ]);
    }
}