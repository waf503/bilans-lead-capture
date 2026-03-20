<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        \App\Models\BusinessSize::insert([
            ['name' => 'Emprendedor / Independiente'],
            ['name' => 'Pequeña Empresa (1-10 empleados)'],
            ['name' => 'Mediana Empresa (11-50 empleados)'],
            ['name' => 'Gran Empresa (+50 empleados)'],
        ]);
    }
}
