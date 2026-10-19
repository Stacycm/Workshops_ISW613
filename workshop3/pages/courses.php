<?php
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
requireLogin();

$cursos = $conn->query(
    "SELECT c.id, c.nombre, c.codigo_curso, c.carrera_id,
            c.creditos, c.descripcion, ca.nombre AS carrera
     FROM cursos c
     INNER JOIN carreras ca ON ca.id = c.carrera_id
     ORDER BY c.nombre"
)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet"
          href="[maxcdn.bootstrapcdn.com](https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css)">
    <link rel="stylesheet" href="/workshop3/assets/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/workshop3/pages/dashboard.php">Workshop 3</a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="/workshop3/pages/profile.php">Perfil</a>
        <a class="nav-item nav-link" href="/workshop3/pages/courses.php">Cursos</a>
        <form action="/workshop3/actions/logout.php" method="POST" class="form-inline">
            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0">Cursos</h2>
        <a href="/workshop3/pages/course_form.php" class="btn btn-primary">
            + Crear Curso
        </a>
    </div>

    <?php if (($_GET['ok'] ?? '') === 'created'): ?>
        <div class="alert alert-success">Curso creado correctamente.</div>
    <?php elseif (($_GET['ok'] ?? '') === 'updated'): ?>
        <div class="alert alert-success">Curso actualizado correctamente.</div>
    <?php elseif (($_GET['ok'] ?? '') === 'deleted'): ?>
        <div class="alert alert-success">Curso eliminado correctamente.</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Carrera</th>
                        <th class="text-center">Créditos</th>
                        <th>Descripción</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cursos as $c): ?>
                        <tr>
                            <td class="font-weight-bold"><?= h($c['nombre']) ?></td>
                            <td><code><?= h($c['codigo_curso']) ?></code></td>
                            <td>
                                <span class="badge-carrera">
                                    <?= (int)$c['carrera_id'] ?> — <?= h($c['carrera']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-secondary">
                                    <?= (int)$c['creditos'] ?>
                                </span>
                            </td>
                            <td class="text-muted small">
                                <?= h(mb_strimwidth($c['descripcion'] ?? '', 0, 70, '…')) ?>
                            </td>
                            <td class="text-center text-nowrap">
                                <a href="/workshop3/pages/course_form.php?id=<?= (int)$c['id'] ?>"
                                   class="btn btn-sm btn-warning">Editar</a>

                                <form action="/workshop3/actions/course_delete.php"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Eliminar este curso?');">
                                    <?= csrfField() ?>
                                    <input type="hidden" name="id" value="<?= (int)$c['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (!$cursos): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No hay cursos registrados.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>


