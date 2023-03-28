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
            'name' => 'Clothing',
            'sex' => 'M'
        ]);

        Category::create([
            'name' => 'Clothing',
            'sex' => 'F'
        ]);

        Category::create([
            'name' => 'Clothing',
            'sex' => 'Kids'
        ]);

        Category::create([
            'name' => 'Travel Bags',
            'sex' => 'M'
        ]);

        Category::create([
            'name' => 'Hand Bags',
            'sex' => 'F'
        ]);

        Category::create([
            'name' => 'School Bags',
            'sex' => 'U'
        ]);

        Category::create([
            'name' => 'Shirts',
            'sex' => 'M'
        ]);

        Category::create([
            'name' => 'Jeans',
            'sex' => 'W'
        ]);

        Category::create([
            'name' => 'Official Shoes',
            'sex' => 'M'
        ]);

        Category::create([
            'name' => 'Shoes',
            'sex' => 'F'
        ]);

        Category::create([
            'name' => 'Phones',
            'sex' => 'U'
        ]);

        Category::create([
            'name' => 'Books',
            'sex' => 'U'
        ]);

        Category::create([
            'name' => 'Sportswear',
            'sex' => 'U'
        ]);

        Category::create([
            'name' => 'Household Items',
            'sex' => 'U'
        ]);

        Category::create([
            'name' => "Cosmetics",
            'sex' => 'F'
        ]);

        Category::create([
            'name' => "Accessories",
            'sex' => 'F'
        ]);

        Category::create([
            'name' => "Sweaters",
            'sex' => 'F'
        ]);

        Category::create([
            'name' => "Hoodies",
            'sex' => 'U'
        ]);
    }
}
