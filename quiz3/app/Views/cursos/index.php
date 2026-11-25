<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Gestión de cursos</h1>
            <p class="text-muted">Administración de cursos académicos</p>
        </div>

        <a href="<?= base_url('cursos/crear') ?>"
           class="btn btn-primary">
            + Agregar curso
        </a>
    </div>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('mensaje')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h5 class="card-title mb-3">Cursos registrados</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Créditos</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($cursos)): ?>

                            <?php foreach ($cursos as $curso): ?>

                                <tr>
                                    <td><?= esc($curso['id']) ?></td>
                                    <td><?= esc($curso['nombre']) ?></td>
                                    <td><?= esc($curso['codigo']) ?></td>
                                    <td><?= esc($curso['creditos']) ?></td>
                                    <td><?= esc($curso['carrera']) ?></td>

                                    <td>
                                        <div class="d-flex gap-2">

                                            <a href="<?= base_url('cursos/editar/' . $curso['id']) ?>"
                                               class="btn btn-warning btn-sm">
                                                Editar
                                            </a>

                                            <form action="<?= base_url('cursos/eliminar/' . $curso['id']) ?>"
                                                  method="post"
                                                  onsubmit="return confirm('¿Deseas eliminar este curso?')">

                                                <?= csrf_field() ?>

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No hay cursos registrados.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
