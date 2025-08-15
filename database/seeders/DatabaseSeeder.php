<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     Author::factory(1000)->create();
    //     Category::factory(3000)->create();
    //     Book::factory(100000)->create();
    //     Rating::factory(500000)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    public function run(): void
    {
        if (app()->environment('production')) {
            // Mode full untuk production requirement
            // Ditandai dengan isi file env    APP_ENV=production
            // Jika ditest pada laptop pribadi maka memory sql baka exhausted /limit (Jika Jumlah data ratusan ribu)
            Author::factory(1000)->create();
            Category::factory(3000)->create();
            Book::factory(100000)->create();
            Rating::factory(500000)->create();
        } else {
            // Mode kecil untuk local/tester 
            // Ditandai dengan isi file env    APP_ENV=local. 
            // Kalau seandainya nge tes di laptop pribadi
            Author::factory(25)->create();
            Category::factory(75)->create();
            Book::factory(1000)->create();
            Rating::factory(1250)->create();
        }
    }
}