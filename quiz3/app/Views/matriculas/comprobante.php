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

    <div class="card shadow-sm border-0 mx-auto"
         style="max-width: 650px;">

        <div class="card-body p-4">

            <div class="text-center mb-4">

                <div class="text-success display-4">
                    ✓
                </div>

                <h1 class="fw-bold">
                    ¡Matrícula exitosa!
                </h1>

                <p class="text-muted">
                    El registro se realizó correctamente.
                </p>

            </div>

            <hr>

            <h5 class="fw-bold mb-3">
                Datos del estudiante
            </h5>

            <div class="mb-3">
                <span class="text-muted">Número de matrícula:</span>
                <div class="fw-bold">
                    #<?= esc($matricula['id']) ?>
                </div>
            </div>

            <div class="mb-3">
                <span class="text-muted">Nombre del estudiante:</span>
                <div class="fw-bold">
                    <?= esc($matricula['estudiante']) ?>
                </div>
            </div>

            <div class="mb-3">
                <span class="text-muted">Identificación:</span>
                <div class="fw-bold">
                    <?= esc($matricula['identificacion']) ?>
                </div>
            </div>

            <hr>

            <h5 class="fw-bold mb-3">
                Datos del curso
            </h5>

            <div class="mb-3">
                <span class="text-muted">Nombre del curso:</span>
                <div class="fw-bold">
                    <?= esc($matricula['curso']) ?>
                </div>
            </div>

            <div class="mb-3">
                <span class="text-muted">Código:</span>
                <div class="fw-bold">
                    <?= esc($matricula['codigo']) ?>
                </div>
            </div>

            <div class="mb-3">
                <span class="text-muted">Créditos:</span>
                <div class="fw-bold">
                    <?= esc($matricula['creditos']) ?>
                </div>
            </div>

            <div class="mb-3">
                <span class="text-muted">Carrera:</span>
                <div class="fw-bold">
                    <?= esc($matricula['carrera']) ?>
                </div>
            </div>

            <hr>

            <div class="mb-4">
                <span class="text-muted">Fecha de matrícula:</span>
                <div class="fw-bold">
                    <?= esc($matricula['fecha_matricula']) ?>
                </div>
            </div>

            <div class="d-grid gap-2">

                <a href="<?= base_url('matricula') ?>"
                   class="btn btn-primary">
                    Realizar otra matrícula
                </a>

                <a href="<?= base_url('cursos') ?>"
                   class="btn btn-outline-secondary">
                    Volver a cursos
                </a>

            </div>

        </div>
    </div>

</div>

</body>
</html>
