<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'first_name' => 'Liam', 'last_name' => 'Terry', 'email' => 'admin@nrsn.com', 'password' => bcrypt('root1234'), 'created_at' => '2022-11-15 09:37:21', 'updated_at' => '2022-12-20 14:56:43'
        ],
        [
            'first_name' => 'Emily', 'last_name' => 'Johnson', 'email' => 'emilyj@gmail.com', 'password' => bcrypt('password123'), 'created_at' => '2022-11-15 09:37:21', 'updated_at' => '2022-12-20 14:56:43'
        ],

        [
            'first_name' => 'Noah', 'last_name' => 'Smith', 'email' => 'noahs@outlook.com', 'password' => bcrypt('secure567'), 'created_at' => '2022-05-07 18:12:34', 'updated_at' => '2022-06-22 09:28:19'
        ],

        [
            'first_name' => 'Olivia', 'last_name' => 'Brown', 'email' => 'oliviab@yahoomail.com', 'password' => bcrypt('pass1234'), 'created_at' => '2022-09-30 11:24:05', 'updated_at' => '2022-12-05 16:17:38'
        ],

        [
            'first_name' => 'Liam', 'last_name' => 'Wilson', 'email' => 'liamwilson@gmail.com', 'password' => bcrypt('abc12345'), 'created_at' => '2022-07-12 14:51:08', 'updated_at' => '2022-09-02 19:43:55'
        ],

        [
            'first_name' => 'Ava', 'last_name' => 'Martinez', 'email' => 'avam@gmail.com', 'password' => bcrypt('password567'), 'created_at' => '2023-01-20 08:33:11', 'updated_at' => '2023-03-07 13:58:29'
        ]

    ]);
    }
}
