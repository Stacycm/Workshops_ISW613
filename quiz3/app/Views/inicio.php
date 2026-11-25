<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                Sistema de Cursos y Matrícula
            </span>
        </div>
    </nav>

    <main class="container py-5">

        <div class="text-center mb-5">
            <h1>Bienvenido al sistema</h1>
            <p class="text-muted">
                Selecciona el módulo al que deseas ingresar.
            </p>
        </div>

        <div class="row justify-content-center g-4">

            <div class="col-md-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h2 class="mb-3">Gestión de cursos</h2>
                        <p class="text-muted">
                            Administra los cursos, sus códigos,
                            créditos y carreras.
                        </p>
                        <a href="<?= base_url('cursos') ?>"
                           class="btn btn-primary">
                            Ir a cursos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h2 class="mb-3">Matrículas</h2>
                        <p class="text-muted">
                            Registra estudiantes y realiza
                            matrículas de cursos.
                        </p>
                        <a href="<?= base_url('matricula') ?>"
                           class="btn btn-success">
                            Ir a matrículas
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>

</body>
</html>
