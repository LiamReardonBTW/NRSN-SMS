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
            'first_name' => 'Liam',
            'last_name' => 'Terry',
            'email' => 'admin@nrsn.com',
            'password' => bcrypt('root1234'),
            'created_at' => '2022-11-15 09:37:21',
            'updated_at' => '2022-12-20 14:56:43',
            'phone' => '+61(02)89876544',
            'role' => '0',
            'address' => '123 Main Street, New York, NY 10001',
            'tfn' => '123456789',
            'abn' => '12345678901'
        ],
        [
            'first_name' => 'Liam',
            'last_name' => 'Reardon',
            'email' => 'manager@nrsn.com',
            'password' => bcrypt('root1234'),
            'created_at' => '2022-11-15 09:37:21',
            'updated_at' => '2022-12-20 14:56:43',
            'phone' => '+61 2 8986 6544',
            'role' => '1',
            'address' => '123 Main Street, New York, NY 10001',
            'tfn' => '123456789',
            'abn' => '12345678901'
        ],
        [
            'first_name' => 'Shuran',
            'last_name' => 'Yang',
            'email' => 'worker@nrsn.com',
            'password' => bcrypt('root1234'),
            'created_at' => '2022-11-15 09:37:21',
            'updated_at' => '2022-12-20 14:56:43',
            'phone' => '02 8986 6544',
            'role' => '2',
            'address' => '123 Main Street, New York, NY 10001',
            'tfn' => '123456789',
            'abn' => '12345678901'
        ],
        [
            'first_name' => 'Junji',
            'last_name' => 'Oshiro',
            'email' => 'emilyj@gmail.com',
            'password' => bcrypt('password123'),
            'created_at' => '2022-11-15 09:37:21',
            'updated_at' => '2022-12-20 14:56:43',
            'phone' => '+61289876544',
            'role' => '2',
            'address' => '456 Oak Avenue, Los Angeles, CA 90001',
            'tfn' => '987654321',
            'abn' => '98765432109'
        ],

        [
            'first_name' => 'Noah',
            'last_name' => 'Smith',
            'email' => 'noahs@outlook.com',
            'password' => bcrypt('secure567'),
            'created_at' => '2022-05-07 18:12:34',
            'updated_at' => '2022-06-22 09:28:19',
            'phone' => '0414 570776',
            'role' => '2',
            'address' => '789 Elm Court, Chicago, IL 60601',
            'tfn' => '246801357',
            'abn' => '24680245781'
        ],

        [
            'first_name' => 'Olivia',
            'last_name' => 'Brown',
            'email' => 'oliviab@yahoomail.com',
            'password' => bcrypt('pass1234'),
            'created_at' => '2022-09-30 11:24:05',
            'updated_at' => '2022-12-05 16:17:38',
            'phone' => '0414570776',
            'role' => '2',
            'address' => '321 Maple Lane, Houston, TX 77001',
            'tfn' => '864207913',
            'abn' => '13579024683'
        ],

        [
            'first_name' => 'Will',
            'last_name' => 'Wilson',
            'email' => 'liamwilson@gmail.com',
            'password' => bcrypt('abc12345'),
            'created_at' => '2022-07-12 14:51:08',
            'updated_at' => '2022-09-02 19:43:55',
            'phone' => '+61 414 570776',
            'role' => '0',
            'address' => '987 Pine Street, Denver, CO 80201',
            'tfn' => '753096248',
            'abn' => '98765432107'
        ],

        [
            'first_name' => 'Ava',
            'last_name' => 'Martinez',
            'email' => 'avam@gmail.com',
            'password' => bcrypt('password567'),
            'created_at' => '2023-01-20 08:33:11',
            'updated_at' => '2023-03-07 13:58:29',
            'phone' => '+61 (04)14 570776',
            'role' => '1',
            'address' => '654 Cedar Avenue, Miami, FL 33010',
            'tfn' => '975314620',
            'abn' => '97531024684'
        ],

        [
            'first_name' => 'Oliver',
            'last_name' => 'Smith',
            'email' => 'oliversmith@gmail.com',
            'password' => bcrypt('qwerty123'),
            'created_at' => '2022-08-05 09:15:22',
            'updated_at' => '2022-09-03 20:30:59',
            'phone' => '+61 (04)14-570-776',
            'role' => '1',
            'address' => '789 Elm Street, San Francisco, CA 94101',
            'tfn' => '624090538',
            'abn' => '54321098765'
        ],

        [
            'first_name' => 'Ava',
            'last_name' => 'Brown',
            'email' => 'avabrown@gmail.com',
            'password' => bcrypt('password123'),
            'created_at' => '2022-07-01 16:39:15',
            'updated_at' => '2022-08-30 10:05:27',
            'phone' => '+61 (04) 12 131 212',
            'role' => '2',
            'address' => '123 Maple Avenue, Chicago, IL 60601',
            'tfn' => '357902468',
            'abn' => '67890123456'
        ],

        [
            'first_name' => 'Emily',
            'last_name' => 'Johnson',
            'email' => 'emilyjohnson@gmail.com',
            'password' => bcrypt('password123'),
            'created_at' => '2022-06-15 10:22:33',
            'updated_at' => '2022-08-29 16:12:47',
            'phone' => '+61(02)89876544',
            'role' => '2',
            'address' => '456 Oak Avenue, New York, NY 10001',
            'tfn' => '246801359',
            'abn' => '12345678910'
        ],

        [
            'first_name' => 'Noah',
            'last_name' => 'Martinez',
            'email' => 'noahmartinez@gmail.com',
            'password' => bcrypt('password123'),
            'created_at' => '2022-06-22 12:48:52',
            'updated_at' => '2022-08-31 18:20:14',
            'phone' => '+61 2 8986 6544',
            'role' => '2',
            'address' => '369 Cedar Street, Miami, FL 33001',
            'tfn' => '802439157',
            'abn' => '34567890123'
        ],

    ]);
    }
}
