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
                'invoice' => '',
                'notes' => 'It was a good day',
                'submitted_by' => '1',
                'client_supported' => '1',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-07',
                'expenses' => '32.56',
                'km' => '16.2',
                'hours' => '7.5',
                'created_at' => '2023-08-07 06:12:47',
            ],

            [
                'invoice' => '',
                'notes' => 'It was a good day',
                'submitted_by' => '2',
                'client_supported' => '2',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-07',
                'expenses' => '0',
                'km' => '5.2',
                'hours' => '7.75',
                'created_at' => '2023-08-07 06:12:47',
            ],

            [
                'invoice' => '',
                'notes' => 'Another busy day',
                'submitted_by' => '1',
                'client_supported' => '3',
                'isflagged' => '1',
                'isinvoiced' => '0',
                'date' => '2023-08-08',
                'expenses' => '12.22',
                'km' => '8.12',
                'hours' => '6.25',
                'created_at' => '2023-08-08 12:34:56',
            ],

            [
                'invoice' => '',
                'notes' => 'Meeting with client',
                'submitted_by' => '5',
                'client_supported' => '2',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-09',
                'expenses' => '20.2',
                'km' => '10.9',
                'hours' => '4',
                'created_at' => '2023-08-09 09:45:00',
            ],

            [
                'invoice' => '',
                'notes' => 'Long shift',
                'submitted_by' => '2',
                'client_supported' => '6',
                'isflagged' => '0',
                'isinvoiced' => '1',
                'date' => '2023-08-10',
                'expenses' => '50',
                'km' => '20.9',
                'hours' => '10.5',
                'created_at' => '2023-08-10 15:27:13',
            ],

            [
                'invoice' => '',
                'notes' => 'Visiting multiple locations',
                'submitted_by' => '5',
                'client_supported' => '4',
                'isflagged' => '0',
                'isinvoiced' => '0',
                'date' => '2023-08-11',
                'expenses' => '45.25',
                'km' => '25',
                'hours' => '8',
                'created_at' => '2023-08-11 18:59:21',
            ],

        ]);
    }
}
