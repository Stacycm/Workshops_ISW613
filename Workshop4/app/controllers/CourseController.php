<?php
class CourseController {
    private Course $courses;
    public function __construct() { global $conn; $this->courses = new Course($conn); }

    public function index(): void {
        requireLogin();
        view('courses/index', ['courses' => $this->courses->all(), 'ok' => $_GET['ok'] ?? '']);
    }
    public function create(): void {
        requireLogin();
        view('courses/form', ['course' => $this->emptyCourse(), 'careers' => $this->courses->careers(), 'editing' => false, 'errors' => $_SESSION['form_errors'] ?? []]);
        unset($_SESSION['form_errors']);
    }
    public function edit(): void {
        requireLogin();
        $id = (int)($_GET['id'] ?? 0);
        $course = $this->courses->find($id);
        if (!$course) redirect('courses');
        view('courses/form', ['course' => $course, 'careers' => $this->courses->careers(), 'editing' => true, 'errors' => []]);
    }
    public function store(): void {
        requireLogin(); verifyCsrf();
        $data = $this->validatedData();
        if ($data === false) { $_SESSION['form_errors'] = ['Complete correctamente todos los campos obligatorios.']; redirect('course-create'); }
        try { $this->courses->create($data); redirect('courses&ok=created'); }
        catch (mysqli_sql_exception $e) { $_SESSION['form_errors'] = ['No se pudo crear el curso. Verifique que el código no esté repetido y que la carrera exista.']; redirect('course-create'); }
    }
    public function update(): void {
        requireLogin(); verifyCsrf();
        $id = (int)($_POST['id'] ?? 0);
        $data = $this->validatedData();
        if ($id < 1 || !$data) { $_SESSION['form_errors'] = ['Datos inválidos.']; redirect('course-edit&id=' . $id); }
        try { $this->courses->update($id, $data); redirect('courses&ok=updated'); }
        catch (mysqli_sql_exception $e) { $_SESSION['form_errors'] = ['No se pudo actualizar. Verifique que el código no esté repetido y que la carrera exista.']; redirect('course-edit&id=' . $id); }
    }
    public function delete(): void {
        requireLogin(); verifyCsrf();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido.'); }
        $this->courses->delete((int)($_POST['id'] ?? 0));
        redirect('courses&ok=deleted');
    }
    private function emptyCourse(): array {
        return ['id'=>'', 'nombre'=>'', 'codigo_curso'=>'', 'carrera_id'=>'', 'creditos'=>'', 'descripcion'=>''];
    }
    private function validatedData(): array|false {
        $nombre = trim($_POST['nombre'] ?? '');
        $codigo = trim($_POST['codigo_curso'] ?? '');
        $carrera = filter_var($_POST['carrera_id'] ?? null, FILTER_VALIDATE_INT);
        $creditos = filter_var($_POST['creditos'] ?? null, FILTER_VALIDATE_INT);
        $descripcion = trim($_POST['descripcion'] ?? '');
        if ($nombre === '' || mb_strlen($nombre) > 150 || $codigo === '' || mb_strlen($codigo) > 20 ||
            !$carrera || $creditos === false || $creditos < 0 || $creditos > 20 || mb_strlen($descripcion) > 1000) return false;
        return ['nombre'=>$nombre, 'codigo_curso'=>$codigo, 'carrera_id'=>$carrera, 'creditos'=>$creditos, 'descripcion'=>$descripcion];
    }
}
