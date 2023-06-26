<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => '1',
            'name' => 'Rice',
        ]);

        Category::create([
            'id' => '2',
            'name' => 'Pasta',
        ]);

        Category::create([
            'id' => '3',
            'name' => 'Flour',
        ]);

        Category::create([
            'id' => '4',
            'name' => 'Beans',
        ]);

        Category::create([
            'id' => '5',
            'name' => 'Apples',
            
        ]);

        Category::create([
            'id' => '6',
            'name' => 'Bananas',
        ]);

        Category::create([
            'id' => '7',
            'name' => 'Carrots',
            
        ]);

        Category::create([
            'id' => '8',
            'name' => 'Tomatoes',
        ]);

        Category::create([
            'id' => '9',
            'name' => 'Milk',
        ]);

        Category::create([
            'id' => '10',
            'name' => 'Yoghurt',
        ]);

        Category::create([
            'id' => '11',
            'name' => 'Butter',
        ]);

        Category::create([
            'id' => '12',
            'name' => 'Eggs',
        ]);

        Category::create([
            'id' => '13',
            'name' => "Chicken",
        ]);

        Category::create([
            'id' => '14',
            'name' => "Ground Beef",
        ]);

        Category::create([
            'id' => '15',
            'name' => "Salmon",
        ]);

        Category::create([
            'id' => '16',
            'name' => "Shrimp",
        ]);

        Category::create([
            'id' => '17',
            'name' => "Coffee",
        ]);

        Category::create([
            'id' => '18',
            'name' => "Chips",
        ]);

        Category::create([
            'id' => '19',
            'name' => "Soda",
        ]);

        Category::create([
            'id' => '20',
            'name' => "Juice",
        ]);
    }
}
