<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate an array of unique user IDs
        $userIds = range(1, 12);

        foreach ($userIds as $userId) {
            // Determine if the user should have an active contract
            $hasActiveContract = 1;

            // Generate one active contract if $hasActiveContract is true
            if ($hasActiveContract) {
                $startDate = now()->subDays(rand(0, 365)); // Active contract can start within the last year
                $endDate = now()->addDays(rand(1, 365)); // Active contract can end within the next year

                $contractData = [
                    'user_id' => $userId,
                    'startdate' => $startDate,
                    'enddate' => $endDate,
                    'weekdayhourlyrate' => rand(15, 25),
                    'saturdayhourlyrate' => rand(25, 40),
                    'sundayhourlyrate' => rand(40, 80),
                    'publicholidayhourlyrate' => rand(60, 100),
                    'active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                DB::table('user_contracts')->insert($contractData);
            }
        }

        // Define the total number of inactive contracts you want to generate
        $totalInactiveContracts = 12;

        // Generate inactive contracts (may have many)
        for ($i = 0; $i < $totalInactiveContracts; $i++) {
            $userId = rand(1, 12); // Assign a random user ID
            $endDate = now()->subDays(rand(365, 730)); // Inactive contract ends at least 365 days ago
            $startDate = $endDate->subDays(rand(0, 364)); // Inactive contract starts at least 365 days before the end date

            $contractData = [
                'user_id' => $userId,
                'startdate' => $startDate,
                'enddate' => $endDate,
                'weekdayhourlyrate' => rand(10, 50),
                'saturdayhourlyrate' => rand(15, 60),
                'sundayhourlyrate' => rand(20, 80),
                'publicholidayhourlyrate' => rand(25, 100),
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('user_contracts')->insert($contractData);
        }

    }
}
