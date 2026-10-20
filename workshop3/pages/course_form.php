<?php
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
requireLogin();

$id     = (int)($_GET['id'] ?? 0);
$editar = $id > 0;

$curso = [
    'nombre'       => '',
    'codigo_curso' => '',
    'carrera_id'   => '',
    'creditos'     => '',
    'descripcion'  => '',
];

$errores = $_SESSION['form_errors'] ?? [];
$old     = $_SESSION['form_old'] ?? null;
unset($_SESSION['form_errors'], $_SESSION['form_old']);

if ($editar) {
    $stmt = $conn->prepare("SELECT * FROM cursos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $encontrado = $stmt->get_result()->fetch_assoc();

    if (!$encontrado) {
        header('Location: /pages/courses.php');
        exit;
    }

    $curso = $encontrado;
    if ($old) {
        $curso = array_merge($curso, $old);
    }
}

$carreras = $conn->query(
    "SELECT id, nombre FROM carreras ORDER BY nombre"
)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editar ? 'Editar Curso' : 'Crear Curso' ?></title>
    <link rel="stylesheet"
          href="[maxcdn.bootstrapcdn.com](https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css)">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/pages/dashboard.php">Workshop 3</a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="/pages/profile.php">Perfil</a>
        <a class="nav-item nav-link" href="/pages/courses.php">Cursos</a>
        <form action="/actions/logout.php" method="POST" class="form-inline">
            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h2 class="page-title mb-4">
                <?= $editar ? 'Editar Curso' : 'Crear Curso' ?>
            </h2>

            <?php foreach ($errores as $err): ?>
                <div class="alert alert-danger"><?= h($err) ?></div>
            <?php endforeach; ?>

            <div class="card">
                <div class="card-body">

                    <form action="/actions/<?= $editar ? 'course_edit' : 'course_create' ?>.php"
                          method="POST">

                        <?= csrfField() ?>

                        <?php if ($editar): ?>
                            <input type="hidden" name="id" value="<?= (int)$id ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre"
                                   name="nombre" maxlength="150" required
                                   value="<?= h($curso['nombre']) ?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="codigo_curso">Código de Curso</label>
                                <input type="text" class="form-control" id="codigo_curso"
                                       name="codigo_curso" maxlength="20" required
                                       value="<?= h($curso['codigo_curso']) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="creditos">Créditos</label>
                                <input type="number" class="form-control" id="creditos"
                                       name="creditos" min="0" max="20" required
                                       value="<?= h($curso['creditos']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="carrera_id">Id de la Carrera</label>
                            <select class="form-control" id="carrera_id"
                                    name="carrera_id" required>
                                <option value="">— Seleccione —</option>
                                <?php foreach ($carreras as $ca): ?>
                                    <option value="<?= (int)$ca['id'] ?>"
                                        <?= (string)$curso['carrera_id'] === (string)$ca['id'] ? 'selected' : '' ?>>
                                        <?= (int)$ca['id'] ?> — <?= h($ca['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción del Curso</label>
                            <textarea class="form-control" id="descripcion"
                                      name="descripcion" rows="4"
                                      maxlength="1000"><?= h($curso['descripcion']) ?></textarea>
                        </div>

                        <hr class="mb-4">

                        <button type="submit" class="btn btn-primary">
                            <?= $editar ? 'Guardar cambios' : 'Crear Curso' ?>
                        </button>
                        <a href="/pages/courses.php"
                           class="btn btn-light border">Cancelar</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
