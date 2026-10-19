<?php
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
requireLogin();

// El taller exige que eliminar sea por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /workshop3/pages/courses.php');
    exit;
}
verifyCsrf();

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {
    header('Location: /workshop3/pages/courses.php');
    exit;
}

$stmt = $conn->prepare("DELETE FROM cursos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header('Location: /workshop3/pages/courses.php?ok=deleted');
exit;
