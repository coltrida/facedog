<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call(UserSeeder::class);

        Storage::disk('public')->deleteDirectory('/users/');
        Storage::disk('public')->deleteDirectory('/posts/');
        Storage::disk('public')->deleteDirectory('/posts/');
        Storage::disk('public')->deleteDirectory('/albums/');
        Storage::disk('public')->deleteDirectory('/profiles/');
        Storage::disk('public')->deleteDirectory('/livewire-tmp/');
        Storage::disk('public')->makeDirectory('/users');
        Storage::disk('public')->makeDirectory('/posts');
        Storage::disk('public')->makeDirectory('/albums');
        Storage::disk('public')->makeDirectory('/profiles');
        Storage::disk('public')->makeDirectory('/livewire-tmp');
    }
}
