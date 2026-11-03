<?php $title = $editing ? 'Editar curso' : 'Crear curso'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-4"><div class="row justify-content-center"><div class="col-lg-8">
<h2 class="page-title mb-4"><?= $editing ? 'Editar Curso' : 'Crear Curso' ?></h2>
<?php foreach ($errors as $error): ?><div class="alert alert-danger"><?= h($error) ?></div><?php endforeach; ?>
<div class="card"><div class="card-body"><form action="<?= url($editing ? 'course-edit' : 'course-create') ?>" method="POST">
<?= csrfField() ?><?php if ($editing): ?><input type="hidden" name="id" value="<?= (int)$course['id'] ?>"><?php endif; ?>
<div class="form-group"><label for="nombre">Nombre</label><input class="form-control" id="nombre" name="nombre" maxlength="150" required value="<?= h($course['nombre']) ?>"></div>
<div class="form-row"><div class="form-group col-md-6"><label for="codigo_curso">Código de Curso</label><input class="form-control" id="codigo_curso" name="codigo_curso" maxlength="20" required value="<?= h($course['codigo_curso']) ?>"></div>
<div class="form-group col-md-6"><label for="creditos">Créditos</label><input class="form-control" type="number" id="creditos" name="creditos" min="0" max="20" required value="<?= h($course['creditos']) ?>"></div></div>
<div class="form-group"><label for="carrera_id">Carrera</label><select class="form-control" id="carrera_id" name="carrera_id" required><option value="">— Seleccione —</option>
<?php foreach ($careers as $career): ?><option value="<?= (int)$career['id'] ?>" <?= (string)$course['carrera_id'] === (string)$career['id'] ? 'selected' : '' ?>><?= (int)$career['id'] ?> — <?= h($career['nombre']) ?></option><?php endforeach; ?>
</select></div>
<div class="form-group"><label for="descripcion">Descripción del Curso</label><textarea class="form-control" id="descripcion" name="descripcion" rows="4" maxlength="1000"><?= h($course['descripcion']) ?></textarea></div>
<hr class="mb-4"><button class="btn btn-primary" type="submit"><?= $editing ? 'Guardar cambios' : 'Crear Curso' ?></button>
<a href="<?= url('courses') ?>" class="btn btn-light border">Cancelar</a></form></div></div>
</div></div></div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
