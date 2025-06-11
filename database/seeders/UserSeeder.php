<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert ([
            'name' => 'raquelzinha',
            'email' => 'raquel@melo.com',
            'password' => Hash::make('05022004'),
        ]);

        DB::table('users')->insert ([
            'name' => 'raquelzinha 2',
            'email' => 'raquel2@melo.com',
            'password' => Hash::make('05022004'),
        ]);
    }
}
