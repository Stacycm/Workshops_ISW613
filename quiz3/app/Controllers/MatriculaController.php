<?php

namespace App\Controllers;

use App\Models\CursoModel;
use App\Models\MatriculaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MatriculaController extends BaseController
{
    protected $cursoModel;
    protected $matriculaModel;

    public function __construct()
    {
        $this->cursoModel = new CursoModel();
        $this->matriculaModel = new MatriculaModel();
    }

    // Mostrar el formulario de matrícula
    public function index()
    {
        $db = \Config\Database::connect();

        $cursos = $db->table('cursos')
            ->select('cursos.*, carreras.nombre AS carrera')
            ->join('carreras', 'carreras.id = cursos.carrera_id')
            ->get()
            ->getResultArray();

        $datos = [
            'titulo' => 'Matrícula de estudiantes',
            'cursos' => $cursos
        ];

        return view('matriculas/index', $datos);
    }

    // Guardar la matrícula
    public function guardar()
    {
        $reglas = [
            'estudiante' => 'required|min_length[3]|max_length[150]',
            'identificacion' => 'required|max_length[30]',
            'curso_id' => 'required|integer'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()
                ->withInput()
                ->with('errores', $this->validator->getErrors());
        }

        $cursoId = $this->request->getPost('curso_id');

        $curso = $this->cursoModel->find($cursoId);

        if (!$curso) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'El curso seleccionado no existe.');
        }

        $datosMatricula = [
            'estudiante' => $this->request->getPost('estudiante'),
            'identificacion' => $this->request->getPost('identificacion'),
            'curso_id' => $cursoId,
            'fecha_matricula' => date('Y-m-d H:i:s')
        ];

        $matriculaId = $this->matriculaModel->insert($datosMatricula);

        if (!$matriculaId) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'No se pudo registrar la matrícula.');
        }

        return redirect()->to('/matricula/comprobante/' . $matriculaId);
    }

    // Mostrar los datos de la matrícula realizada
    public function comprobante($id = null)
    {
        $db = \Config\Database::connect();

        $matricula = $db->table('matriculas')
            ->select('matriculas.*, cursos.nombre AS curso, cursos.codigo, cursos.creditos, carreras.nombre AS carrera')
            ->join('cursos', 'cursos.id = matriculas.curso_id')
            ->join('carreras', 'carreras.id = cursos.carrera_id')
            ->where('matriculas.id', $id)
            ->get()
            ->getRowArray();

        if (!$matricula) {
            throw PageNotFoundException::forPageNotFound(
                'Matrícula no encontrada'
            );
        }

        $datos = [
            'titulo' => 'Comprobante de matrícula',
            'matricula' => $matricula
        ];

        return view('matriculas/comprobante', $datos);
    }
}

