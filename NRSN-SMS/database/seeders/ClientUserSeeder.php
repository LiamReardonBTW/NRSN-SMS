<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_user')->insert([
            //Supporters and managers of client_id = 1
            [
                'client_id' => '1',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '1',
                'user_id' => '5',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '1',
                'user_id' => '6',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '1',
                'user_id' => '2',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 3
            [
                'client_id' => '3',
                'user_id' => '12',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '3',
                'user_id' => '10',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '3',
                'user_id' => '5',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '3',
                'user_id' => '8',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 4
            [
                'client_id' => '4',
                'user_id' => '4',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '4',
                'user_id' => '10',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '4',
                'user_id' => '6',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '4',
                'user_id' => '9',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 5
            [
                'client_id' => '5',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '4',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '12',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '2',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 7
            [
                'client_id' => '7',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '7',
                'user_id' => '6',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '7',
                'user_id' => '11',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '7',
                'user_id' => '8',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 8
            [
                'client_id' => '8',
                'user_id' => '4',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '8',
                'user_id' => '10',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '8',
                'user_id' => '12',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '8',
                'user_id' => '2',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 9
            [
                'client_id' => '9',
                'user_id' => '12',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '9',
                'user_id' => '11',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '9',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '9',
                'user_id' => '11',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 11
            [
                'client_id' => '11',
                'user_id' => '6',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '11',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '11',
                'user_id' => '4',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '11',
                'user_id' => '9',
                'relation' => 'managed_by',
            ],
            //Supporters and managers of client_id = 12
            [
                'client_id' => '12',
                'user_id' => '3',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '10',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '12',
                'relation' => 'supported_by',
            ],
            [
                'client_id' => '5',
                'user_id' => '8',
                'relation' => 'managed_by',
            ],
        ]);
    }
}
