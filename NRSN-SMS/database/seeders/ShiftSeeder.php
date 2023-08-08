<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shifts')->insert([
            [
                'invoice' => 'INV-21-12-009',
                'notes' => 'It was a good day',
                'submitted_by' => 'Emily Johnson',
                'client_supported' => 'Clarke Mack',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-07',
                'expenses' => '32',
                'km' => '16',
                'hours' => '7',

                'created_at' => '2023-08-07 06:12:47',

            ],
        ]);
    }
}
