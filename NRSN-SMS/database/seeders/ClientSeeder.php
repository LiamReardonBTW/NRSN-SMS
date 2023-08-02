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
            'phone' => '+1 (463) 928-6961',
            'email' => 'fexunyhi@mailinator.com',
            'address' => '12 Dry Drive, Mudgeeraba',
            'invoicing_codes' => '946-1036'],
            [
            'first_name' => 'Benedict',
            'last_name' => 'Fowler',
            'active' => 0,
            'phone' => '+1 (229) 905-9149',
            'email' => 'curi@mailinator.com',
            'address' => '33 Angel Ave, Nerang',
            'invoicing_codes' => '421-6523'],
            [
            'first_name' => 'Kyle',
            'last_name' => 'Beasley',
            'active' => 1,
            'phone' => '+1 (536) 268-6362',
            'email' => 'masahe@mailinator.com',
            'address' => '421 Timber Street, Bonogin',
            'invoicing_codes' => 'test']
        ]);
    }
}
