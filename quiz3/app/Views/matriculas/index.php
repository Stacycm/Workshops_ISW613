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

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 750px;">

        <div class="card-body p-4">

            <h1 class="fw-bold text-center mb-2">
                Matrícula de estudiantes
            </h1>

            <p class="text-muted text-center mb-4">
                Completa tus datos y selecciona el curso que deseas matricular.
            </p>

            <?php if (session()->getFlashdata('errores')): ?>

                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errores') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>

            <?php endif; ?>

            <form action="<?= base_url('matricula/guardar') ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">
                        Nombre completo del estudiante
                    </label>

                    <input type="text"
                           name="estudiante"
                           class="form-control"
                           value="<?= esc(old('estudiante')) ?>"
                           placeholder="Ingresa tu nombre completo"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Número de identificación
                    </label>

                    <input type="text"
                           name="identificacion"
                           class="form-control"
                           value="<?= esc(old('identificacion')) ?>"
                           placeholder="Ingresa tu identificación"
                           required>

                </div>

                <h5 class="fw-bold mb-3">
                    Selecciona un curso
                </h5>

                <div class="row g-3">

                    <?php if (!empty($cursos)): ?>

                        <?php foreach ($cursos as $curso): ?>

                            <div class="col-md-6">

                                <label class="card h-100 p-3 shadow-sm">

                                    <div class="form-check">

                                        <input class="form-check-input"
                                               type="radio"
                                               name="curso_id"
                                               value="<?= esc($curso['id']) ?>"
                                               <?= old('curso_id') == $curso['id'] ? 'checked' : '' ?>
                                               required>

                                        <span class="fw-bold">
                                            <?= esc($curso['nombre']) ?>
                                        </span>

                                    </div>

                                    <div class="mt-2 small text-muted">
                                        Código: <?= esc($curso['codigo']) ?>
                                    </div>

                                    <div class="small text-muted">
                                        Créditos: <?= esc($curso['creditos']) ?>
                                    </div>

                                    <div class="small text-muted">
                                        Carrera: <?= esc($curso['carrera']) ?>
                                    </div>

                                </label>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="col-12">
                            <div class="alert alert-warning">
                                No hay cursos disponibles para matricular.
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

                <div class="d-grid mt-4">

                    <button type="submit"
                            class="btn btn-primary btn-lg"
                            <?= empty($cursos) ? 'disabled' : '' ?>>
                        Matricular
                    </button>

                </div>

            </form>

            <div class="text-center mt-3">

                <a href="<?= base_url('cursos') ?>"
                   class="text-decoration-none">
                    Volver a gestión de cursos
                </a>

            </div>

        </div>
    </div>

</div>

</body>
</html>
