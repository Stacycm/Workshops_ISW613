<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CarreraSeeder extends Seeder
{
    public function run()
    {
        $carreras = [
            ['nombre' => 'Ingeniería en Software'],
            ['nombre' => 'Ingeniería en Sistemas'],
            ['nombre' => 'Administración de Empresas'],
            ['nombre' => 'Contabilidad'],
            ['nombre' => 'Diseño Gráfico'],
        ];

        $this->db->table('carreras')->insertBatch($carreras);
    }
}

