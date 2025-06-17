<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->truncate();

        DB::table('categorias')->insert([
          'nome' => 'Doce',
          'created_at' => now(),
          'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
          'nome' => 'Salgado',
          'created_at' => now(),
          'updated_at' => now()
          ]);

          DB::table('categorias')->insert([
          'nome' => 'Prato Principal',
          'created_at' => now(),
          'updated_at' => now()
          ]);

    }
}
