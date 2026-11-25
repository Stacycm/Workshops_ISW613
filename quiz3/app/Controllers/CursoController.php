<?php

namespace App\Controllers;

use App\Models\CursoModel;
use App\Models\CarreraModel;

class CursoController extends BaseController
{
    protected $cursoModel;
    protected $carreraModel;

    public function __construct()
    {
        $this->cursoModel = new CursoModel();
        $this->carreraModel = new CarreraModel();
    }

    // Mostrar todos los cursos
    public function index()
    {
        $db = \Config\Database::connect();

        $cursos = $db->table('cursos')
            ->select('cursos.*, carreras.nombre AS carrera')
            ->join('carreras', 'carreras.id = cursos.carrera_id')
            ->get()
            ->getResultArray();

        $datos = [
            'titulo' => 'Lista de cursos',
            'cursos' => $cursos
        ];

        return view('cursos/index', $datos);
    }

    // Mostrar formulario para crear un curso
    public function crear()
    {
        $datos = [
            'titulo' => 'Registrar curso',
            'carreras' => $this->carreraModel->findAll()
        ];

        return view('cursos/crear', $datos);
    }

    // Guardar un curso nuevo
    public function guardar()
    {
        $reglas = [
            'nombre' => 'required|min_length[3]|max_length[150]',
            'codigo' => 'required|max_length[30]|is_unique[cursos.codigo]',
            'creditos' => 'required|integer|greater_than[0]',
            'carrera_id' => 'required|integer'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()
                ->withInput()
                ->with('errores', $this->validator->getErrors());
        }

        $this->cursoModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'codigo' => $this->request->getPost('codigo'),
            'creditos' => $this->request->getPost('creditos'),
            'carrera_id' => $this->request->getPost('carrera_id')
        ]);

        return redirect()->to('/cursos')
            ->with('mensaje', 'Curso registrado correctamente.');
    }

    // Mostrar formulario para editar
    public function editar($id = null)
    {
        $curso = $this->cursoModel->find($id);

        if (!$curso) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Curso no encontrado'
            );
        }

        $datos = [
            'titulo' => 'Editar curso',
            'curso' => $curso,
            'carreras' => $this->carreraModel->findAll()
        ];

        return view('cursos/editar', $datos);
    }

    // Actualizar un curso
    public function actualizar($id = null)
    {
        $curso = $this->cursoModel->find($id);

        if (!$curso) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Curso no encontrado'
            );
        }

        $reglas = [
            'nombre' => 'required|min_length[3]|max_length[150]',
            'codigo' => "required|max_length[30]|is_unique[cursos.codigo,id,{$id}]",
            'creditos' => 'required|integer|greater_than[0]',
            'carrera_id' => 'required|integer'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()
                ->withInput()
                ->with('errores', $this->validator->getErrors());
        }

        $this->cursoModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'codigo' => $this->request->getPost('codigo'),
            'creditos' => $this->request->getPost('creditos'),
            'carrera_id' => $this->request->getPost('carrera_id')
        ]);

        return redirect()->to('/cursos')
            ->with('mensaje', 'Curso actualizado correctamente.');
    }

    // Eliminar un curso
    public function eliminar($id = null)
    {
        $curso = $this->cursoModel->find($id);

        if (!$curso) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Curso no encontrado'
            );
        }

        if ($this->cursoModel->delete($id)) {
            return redirect()->to('/cursos')
                ->with('mensaje', 'Curso eliminado correctamente.');
        }

        return redirect()->to('/cursos')
            ->with('error', 'No se pudo eliminar el curso.');
    }
}

