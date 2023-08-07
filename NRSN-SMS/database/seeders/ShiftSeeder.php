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
                'created_at' => '2023-08-07 06:12:47',
                'submitted_by' => 'Liam R'
            ],
            [
                'created_at' => '2023-08-04 12:12:47',
                'submitted_by' => 'Shuran'
            ],
            [
                'created_at' => '2023-08-06 16:01:52',
                'submitted_by' => 'Liam T'
            ],
            [
                'created_at' => '2023-08-07 16:52:05',
                'submitted_by' => 'Shuran'
            ]
        ]);
    }
}
