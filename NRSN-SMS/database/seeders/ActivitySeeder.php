<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            [
                'activityname' => 'Access Community Social and Rec Activ - Standard',
                'weekdayhourlycode' => '04_104_0125_6_1',
                'saturdayhourlycode' => '04_105_0125_6_1',
                'sundayhourlycode' => '04_106_0125_6_1',
                'publicholidayhourlycode' => '04_102_0125_6_1',
                'active' => 1,
            ],
            [
                'activityname' => 'Assistance With Self-Care Activities - Standard',
                'weekdayhourlycode' => '01_002_0107_1_1',
                'saturdayhourlycode' => '01_013_0107_1_1',
                'sundayhourlycode' => '01_014_0107_1_1',
                'publicholidayhourlycode' => '01_012_0107_1_1',
                'active' => 1,
            ],
            [
                'activityname' => 'Group Activities - Standard',
                'weekdayhourlycode' => '04_102_0136_6_1',
                'saturdayhourlycode' => '04_104_0136_6_1',
                'sundayhourlycode' => '04_105_0136_6_1',
                'publicholidayhourlycode' => '04_106_0136_6_1',
                'active' => 1,
            ],
        ]);
    }

}
