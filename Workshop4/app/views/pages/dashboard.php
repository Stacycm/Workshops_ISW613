<?php $title = 'Panel principal'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-4"><div class="row justify-content-center"><div class="col-lg-8"><div class="card"><div class="card-body p-4">
<h2 class="page-title">Bienvenido</h2><p>Hola, <strong><?= h($_SESSION['name'] ?? $_SESSION['username'] ?? 'Usuario') ?></strong>.</p>
<p class="text-muted mb-4">Desde aquí puedes acceder a tus cursos.</p><a href="<?= url('courses') ?>" class="btn btn-primary">Ver Cursos</a>
</div></div></div></div></div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
