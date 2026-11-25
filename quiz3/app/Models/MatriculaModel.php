<?php

namespace App\Models;

use CodeIgniter\Model;

class MatriculaModel extends Model
{
    protected $table = 'matriculas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'estudiante',
        'identificacion',
        'curso_id',
        'fecha_matricula'
    ];

    protected $useTimestamps = false;
}

