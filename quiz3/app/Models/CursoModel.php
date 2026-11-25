<?php

namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'codigo',
        'creditos',
        'carrera_id'
    ];

    protected $useTimestamps = false;
}
