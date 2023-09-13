<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
            'first_name' => 'Clarke',
            'last_name' => 'Mack',
            'active' => 1,
            'phone' => '+61(02)89876544',
            'email' => 'fexunyhi@mailinator.com',
            'address' => '12 Dry Drive, Mudgeeraba',
            'invoicing_codes' => '946-1036'],
            [
            'first_name' => 'Benedict',
            'last_name' => 'Fowler',
            'active' => 0,
            'phone' => '+61 2 8986 6544',
            'email' => 'curi@mailinator.com',
            'address' => '33 Angel Ave, Nerang',
            'invoicing_codes' => '421-6523'],
            [
            'first_name' => 'Kyle',
            'last_name' => 'Beasley',
            'active' => 1,
            'phone' => '0414 570776',
            'email' => 'masahe@mailinator.com',
            'address' => '421 Timber Street, Bonogin',
            'invoicing_codes' => '552-1235'],
            [
            'first_name' => 'Emma',
            'last_name' => 'Smith',
            'active' => 1,
            'phone' => '+61 414 570776',
            'email' => 'emmajane@mailinator.com',
            'address' => '234 Oak Avenue, Springfield',
            'invoicing_codes' => '726-9821'],
            [
            'first_name' => 'Matthew',
            'last_name' => 'Johnson',
            'active' => 1,
            'phone' => '02 8986 6544',
            'email' => 'mattjohnson@mailinator.com',
            'address' => '89 Pine Street, Lakeside',
            'invoicing_codes' => '352-7819'],
            [
            'first_name' => 'Olivia',
            'last_name' => 'Davis',
            'active' => 0,
            'phone' => '+61 (04) 12 131 212',
            'email' => 'oliviadavis@mailinator.com',
            'address' => '567 Elm Drive, Meadowbrook',
            'invoicing_codes' => '945-6723'],
            [
            'first_name' => 'Noah',
            'last_name' => 'Robinson',
            'active' => 1,
            'phone' => '0414570776',
            'email' => 'noahrobinson@mailinator.com',
            'address' => '742 Maple Lane, Willow Creek',
            'invoicing_codes' => '108-3926'],

            [
                'first_name' => 'Emilia',
                'last_name' => 'Johns',
                'active' => 1,
                'phone' => '04 1457 0776',
                'email' => 'emiliajohns@mailinator.com',
                'address' => '123 Oak Avenue, Riverside',
                'invoicing_codes' => '785-9431'
            ],

            [
                'first_name' => 'Emily',
                'last_name' => 'Smith',
                'active' => 1,
                'phone' => '+61 414 570776',
                'email' => 'emilysmith@mailinator.com',
                'address' => '123 Oak Avenue, Riverside',
                'invoicing_codes' => '785-9431'
            ],

            [
                'first_name' => 'Jacob',
                'last_name' => 'Davis',
                'active' => 0,
                'phone' => '+61(02)89876544',
                'email' => 'jacobdavis@mailinator.com',
                'address' => '456 Elm Street, Hillside',
                'invoicing_codes' => '234-1098'
            ],

            [
                'first_name' => 'Sophia',
                'last_name' => 'Williams',
                'active' => 1,
                'phone' => '+61 2 8986 6544',
                'email' => 'sophiawilliams@mailinator.com',
                'address' => '789 Maple Avenue, Lakeside',
                'invoicing_codes' => '876-5432'
            ],

            [
                'first_name' => 'Benjamin',
                'last_name' => 'Miller',
                'active' => 1,
                'phone' => '0414 570776',
                'email' => 'benjaminmiller@mailinator.com',
                'address' => '567 Walnut Street, Hillside',
                'invoicing_codes' => '432-1098'
            ],

        ]);
    }
}
