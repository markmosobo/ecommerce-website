<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'phone_1' => '+254 790-65-9917',
            'phone_2' => '+254 768-196-097',
            'email_1' => 'mmosobo@gmail.com',
            'email_2' => 'makiracamilla@gmail.com',
            'address' => 'BOX OFFICE. P. O. BOX 190-50100,. Kakamega'
        ]);
    }
}
