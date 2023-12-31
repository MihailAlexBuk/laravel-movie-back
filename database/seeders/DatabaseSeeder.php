<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->create(['title' => 'Фильмы']);
        Category::factory()->create(['title' => 'Мультфильмы']);
        Category::factory()->create(['title' => 'Сериалы']);
    }
}
