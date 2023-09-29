<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BusinessDetail;
use Illuminate\Database\Seeder;

class BusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a single BusinessDetail entry
        BusinessDetail::create([
            'businessname' => 'Northern Rivers Support Network',
            'businessaddress' => '123 Main Street',
            'businessphone' => '555-123-4567',
            'businesstfn' => '123456789',
            'businessabn' => '987654321',
        ]);
    }
}
