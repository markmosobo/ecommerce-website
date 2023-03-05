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
            'name' => 'Bags - Men'
        ]);

        Category::create([
            'name' => 'Bags - Women'
        ]);

        Category::create([
            'name' => 'Clothes - Men'
        ]);

        Category::create([
            'name' => 'Clothes - Women'
        ]);

        Category::create([
            'name' => 'Shoes - Men'
        ]);

        Category::create([
            'name' => 'Shoes - Women'
        ]);

        Category::create([
            'name' => 'Phones'
        ]);

        Category::create([
            'name' => 'Books'
        ]);

        Category::create([
            'name' => 'Sports'
        ]);

        Category::create([
            'name' => 'Household Items'
        ]);

        Category::create([
            'name' => "Kid's Item"
        ]);
    }
}
