<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'short_description' => 'Marcamilla is a website about selling the common items available and within easy reach',
            'quote' => "Do what you love to do and give it your very best. Whether it's business or baseball, or the theater, or any field. If you don't love what you're doing and you can't give it your best, get out of it. Life is too short. You'll be an old man before you know it.",
            'long_description' => 'What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.'
        ]);
    }
}
