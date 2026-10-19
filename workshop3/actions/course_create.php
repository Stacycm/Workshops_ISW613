<?php
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /workshop3/pages/courses.php');
    exit;
}
verifyCsrf();

$nombre      = trim($_POST['nombre'] ?? '');
$codigo      = strtoupper(trim($_POST['codigo_curso'] ?? ''));
$carreraId   = (int)($_POST['carrera_id'] ?? 0);
$creditos    = (int)($_POST['creditos'] ?? 0);
$descripcion = trim($_POST['descripcion'] ?? '');

$errores = [];

if ($nombre === '') {
    $errores[] = 'El nombre es obligatorio.';
}
if ($codigo === '') {
    $errores[] = 'El código de curso es obligatorio.';
}
if ($carreraId <= 0) {
    $errores[] = 'Debe seleccionar una carrera.';
}
if ($creditos < 0 || $creditos > 20) {
    $errores[] = 'Los créditos deben estar entre 0 y 20.';
}

if (!$errores) {
    $stmt = $conn->prepare("SELECT id FROM cursos WHERE codigo_curso = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $errores[] = 'Ya existe un curso con ese código.';
    }
}

if ($errores) {
    $_SESSION['form_errors'] = $errores;
    $_SESSION['form_old']    = [
        'nombre'       => $nombre,
        'codigo_curso' => $codigo,
        'carrera_id'   => $carreraId,
        'creditos'     => $creditos,
        'descripcion'  => $descripcion,
    ];
    header('Location: /workshop3/pages/course_form.php');
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO cursos (nombre, codigo_curso, carrera_id, creditos, descripcion)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssiis", $nombre, $codigo, $carreraId, $creditos, $descripcion);
$stmt->execute();

header('Location: /workshop3/pages/courses.php?ok=created');
exit;