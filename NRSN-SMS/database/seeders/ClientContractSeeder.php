<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adjust the number of records you want to generate
        $numContracts = 10;

        // Generate an array of unique client IDs
        $clientIds = range(1, 12);
        shuffle($clientIds);

        for ($i = 0; $i < $numContracts; $i++) {
            $clientId = array_pop($clientIds);

            $contractData = [
                'client_id' => $clientId,
                'startdate' => now()->subDays(rand(0, 365)),
                'enddate' => now()->addDays(rand(1, 365)), // enddate is not nullable
                'balance' => rand(1000, 100000) / 100,
                'weekdayhourlyrate' => rand(10, 50),
                'saturdayhourlyrate' => rand(15, 60),
                'sundayhourlyrate' => rand(20, 80),
                'publicholidayhourlyrate' => rand(25, 100),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('client_contracts')->insert($contractData);
        }
    }
}
