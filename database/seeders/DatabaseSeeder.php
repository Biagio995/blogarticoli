<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => 'Tecnologia',
                "color" => 'background-color: #1E88E5; color: white'
            ],
            [
                "name" => 'Salute & Benessere',
                "color" => 'background-color: #43A047; color: black'
            ],
            [
                "name" => 'Finanza',
                "color" => 'background-color: #FDD835; color: black'
            ],
            [
                "name" => 'Cultura & Istruzione',
                "color" => 'background-color: #8E24AA; color: white'
            ],
            [
                "name" => "Viaggi",
                "color" => "background-color: #F4511E; color: white"
            ],
        ];

        User::factory()->create([
            'name' => 'Biagio Carannante',
            'email' => 'biagio@mail.it',
            'password' => '123456789',
        ]);

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
