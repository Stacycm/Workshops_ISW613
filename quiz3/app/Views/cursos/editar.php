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

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 650px;">

        <div class="card-body p-4">

            <h2 class="fw-bold mb-2">Editar curso</h2>
            <p class="text-muted">Modifica la información del curso.</p>

            <?php if (session()->getFlashdata('errores')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errores') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('cursos/actualizar/' . $curso['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Nombre del curso</label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="<?= esc(old('nombre', $curso['nombre'])) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Código del curso</label>

                    <input type="text"
                           name="codigo"
                           class="form-control"
                           value="<?= esc(old('codigo', $curso['codigo'])) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad de créditos</label>

                    <input type="number"
                           name="creditos"
                           class="form-control"
                           value="<?= esc(old('creditos', $curso['creditos'])) ?>"
                           min="1"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Carrera</label>

                    <select name="carrera_id" class="form-select" required>

                        <?php foreach ($carreras as $carrera): ?>

                            <option value="<?= esc($carrera['id']) ?>"
                                <?= old('carrera_id', $curso['carrera_id']) == $carrera['id'] ? 'selected' : '' ?>>

                                <?= esc($carrera['nombre']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        Actualizar curso
                    </button>

                    <a href="<?= base_url('cursos') ?>"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
