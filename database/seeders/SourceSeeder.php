<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        \App\Models\Source::insert([
            ['name' => 'Valla Publicitaria'],
            ['name' => 'Redes Sociales'],
            ['name' => 'Búsqueda Directa / Web'],
            ['name' => 'Referido'],
        ]);
    }
}
