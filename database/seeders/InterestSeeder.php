<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        \App\Models\Interest::insert([
            ['name' => 'Facturación Electrónica (DTE)'],
            ['name' => 'Control de Inventarios y Sucursales'],
            ['name' => 'Punto de Venta (POS) para Restaurantes'],
            ['name' => 'Contabilidad y Finanzas Corporativas'],
            ['name' => 'Nómina y Recursos Humanos'],
            ['name' => 'Control de Producción Industrial'],
            ['name' => 'Gestión de Lotificaciones'],
        ]);
    }
}
