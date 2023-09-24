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

        // Generate an array of unique client IDs
        $clientIds = range(1, 12);

        foreach ($clientIds as $clientId) {
            // Determine if the client should have an active contract
            $hasActiveContract = 1;

            // Generate one active contract if $hasActiveContract is true
            if ($hasActiveContract) {
                $startDate = now()->subDays(rand(0, 365)); // Active contract can start within the last year
                $endDate = now()->addDays(rand(1, 365)); // Active contract can end within the next year

                $contractData = [
                    'client_id' => $clientId,
                    'startdate' => $startDate,
                    'enddate' => $endDate,
                    'totalallocated' => rand(50000, 100000),
                    'balance' => rand(1000, 100000) / 100,
                    'active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                DB::table('client_contracts')->insert($contractData);
            }
        }

        // Define the total number of inactive contracts you want to generate
        $totalInactiveContracts = 12;

        // Generate inactive contracts (may have many)
        for ($i = 0; $i < $totalInactiveContracts; $i++) {
            $clientId = rand(1, 12); // Assign a random client ID
            $endDate = now()->subDays(rand(365, 730)); // Inactive contract ends at least 365 days ago
            $startDate = $endDate->subDays(rand(0, 364)); // Inactive contract starts at least 365 days before the end date

            $contractData = [
                'client_id' => $clientId,
                'startdate' => $startDate,
                'enddate' => $endDate,
                'totalallocated' => rand(50000, 100000),
                'balance' => rand(1000, 100000) / 100,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('client_contracts')->insert($contractData);
        }
    }
}
