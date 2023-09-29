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
            'name' => 'Northern Rivers Support Network',
            'address' => '123 Main Street',
            'phone' => '555-123-4567',
            'tfn' => '123456789',
            'abn' => '987654321',
            'bankname' => 'Heritage',
            'bankaddress' => '45 Liam Terrace',
            'bankaccountnumber' => '9876-5432-1234',
            'bankbsbnumber' => '123-456',
        ]);
    }
}
