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
                'submitted_by' => 'Michael James'
            ],
            [
                'created_at' => '2023-08-04 12:12:47',
                'submitted_by' => 'Gordon Paige'
            ],
            [
                'created_at' => '2023-08-06 16:01:52',
                'submitted_by' => 'Brad Pitt'
            ],
            [
                'created_at' => '2023-08-07 16:52:05',
                'submitted_by' => 'Jamie Peterson'
            ],
            [
                'created_at' => '2023-08-07 16:52:05',
                'submitted_by' => 'John Smith'],
            [
                'created_at' => '2023-07-21 09:15:42',
                'submitted_by' => 'Emily Johnson'],
            [
                'created_at' => '2023-09-05 14:36:18',
                'submitted_by' => 'Robert Brown'],
            [
                'created_at' => '2023-08-30 21:07:56',
                'submitted_by' => 'Sarah Davis'],
            [
                'created_at' => '2023-07-12 10:45:33',
                'submitted_by' => 'Michael Wilson',]
        ]);
    }
}
