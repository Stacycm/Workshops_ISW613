<?php $title = 'Cursos'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-4">
<div class="d-flex justify-content-between align-items-center mb-4"><h2 class="page-title mb-0">Cursos</h2><a href="<?= url('course-create') ?>" class="btn btn-primary">+ Crear Curso</a></div>
<?php if ($ok === 'created'): ?><div class="alert alert-success">Curso creado correctamente.</div>
<?php elseif ($ok === 'updated'): ?><div class="alert alert-success">Curso actualizado correctamente.</div>
<?php elseif ($ok === 'deleted'): ?><div class="alert alert-success">Curso eliminado correctamente.</div><?php endif; ?>
<div class="card"><div class="card-body p-0"><table class="table table-hover mb-0">
<thead class="thead-light"><tr><th>Nombre</th><th>Código</th><th>Carrera</th><th class="text-center">Créditos</th><th>Descripción</th><th class="text-center">Acciones</th></tr></thead><tbody>
<?php foreach ($courses as $course): ?><tr>
<td class="font-weight-bold"><?= h($course['nombre']) ?></td><td><code><?= h($course['codigo_curso']) ?></code></td>
<td><span class="badge-carrera"><?= (int)$course['carrera_id'] ?> — <?= h($course['carrera']) ?></span></td>
<td class="text-center"><span class="badge badge-secondary"><?= (int)$course['creditos'] ?></span></td>
<td class="text-muted small"><?= h(mb_strimwidth($course['descripcion'] ?? '', 0, 70, '…')) ?></td>
<td class="text-center text-nowrap"><a class="btn btn-sm btn-warning" href="<?= url('course-edit', ['id'=>$course['id']]) ?>">Editar</a>
<form action="<?= url('course-delete') ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este curso?');">
<?= csrfField() ?><input type="hidden" name="id" value="<?= (int)$course['id'] ?>"><button class="btn btn-sm btn-danger" type="submit">Eliminar</button></form></td>
</tr><?php endforeach; ?>
<?php if (!$courses): ?><tr><td colspan="6" class="text-center text-muted py-4">No hay cursos registrados.</td></tr><?php endif; ?>
</tbody></table></div></div></div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
