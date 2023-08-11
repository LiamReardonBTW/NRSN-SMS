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

            [
                'invoice' => 'INV-21-12-010',
                'notes' => 'Another busy day',
                'submitted_by' => 'John Smith',
                'client_supported' => 'Sarah Davis',
                'isflagged' => '1',
                'isinvoiced' => '0',
                'date' => '2023-08-08',
                'expenses' => '12',
                'km' => '8',
                'hours' => '6',
                'created_at' => '2023-08-08 12:34:56',
            ],

            [
                'invoice' => 'INV-21-12-011',
                'notes' => 'Meeting with client',
                'submitted_by' => 'Jessica Thompson',
                'client_supported' => 'Peter Wilson',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-09',
                'expenses' => '20',
                'km' => '10',
                'hours' => '4',
                'created_at' => '2023-08-09 09:45:00',
            ],

            [
                'invoice' => 'INV-21-12-012',
                'notes' => 'Long shift',
                'submitted_by' => 'Michael Anderson',
                'client_supported' => 'Jennifer Brown',
                'isflagged' => '0',
                'isinvoiced' => '1',
                'date' => '2023-08-10',
                'expenses' => '50',
                'km' => '20',
                'hours' => '10',
                'created_at' => '2023-08-10 15:27:13',
            ],

            [
                'invoice' => 'INV-21-12-013',
                'notes' => 'Visiting multiple locations',
                'submitted_by' => 'Laura Roberts',
                'client_supported' => 'David Johnson',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-11',
                'expenses' => '45',
                'km' => '25',
                'hours' => '8',
                'created_at' => '2023-08-11 18:59:21',
            ],

        ]);
    }
}
