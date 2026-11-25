<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $cursos = [
            [
                'nombre' => 'Programación Web',
                'codigo' => 'PROG-101',
                'creditos' => 4,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Bases de Datos',
                'codigo' => 'BD-102',
                'creditos' => 3,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Redes de Computadoras',
                'codigo' => 'RED-201',
                'creditos' => 4,
                'carrera_id' => 2
            ],
            [
                'nombre' => 'Contabilidad General',
                'codigo' => 'CONT-101',
                'creditos' => 3,
                'carrera_id' => 4
            ],
            [
                'nombre' => 'Diseño Digital',
                'codigo' => 'DIS-101',
                'creditos' => 3,
                'carrera_id' => 5
            ],
        ];

        $this->db->table('cursos')->insertBatch($cursos);
    }
}

