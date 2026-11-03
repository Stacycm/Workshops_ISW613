<?php $title = 'Mi perfil'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-4"><div class="row justify-content-center"><div class="col-md-6">
<h2 class="page-title mb-4">Mi Perfil</h2><div class="card"><div class="card-body"><table class="table table-borderless mb-0">
<tr><th class="text-muted w-25">Usuario</th><td><?= h($user['username'] ?? '') ?></td></tr>
<tr><th class="text-muted">Nombre</th><td><?= h($user['name'] ?? '') ?></td></tr>
</table></div></div><a href="<?= url('courses') ?>" class="btn btn-secondary mt-3">Volver a Cursos</a>
</div></div></div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
