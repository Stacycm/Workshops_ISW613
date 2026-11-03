<?php $title = 'Registro'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container auth"><div class="row justify-content-center"><div class="col-md-6">
<div class="card"><div class="card-header text-center"><h4 class="mb-0">Crear cuenta</h4></div><div class="card-body">
<?php if ($error === 'exists'): ?><div class="alert alert-danger">Ese usuario ya existe.</div>
<?php elseif ($error === 'empty'): ?><div class="alert alert-danger">Todos los campos son obligatorios.</div>
<?php elseif ($error === 'register'): ?><div class="alert alert-danger">No se pudo completar el registro.</div><?php endif; ?>
<form action="<?= url('register') ?>" method="POST">
<div class="form-group"><label for="name">Nombre completo</label><input class="form-control" id="name" name="name" required></div>
<div class="form-group"><label for="username">Usuario</label><input class="form-control" id="username" name="username" required></div>
<div class="form-group"><label for="password">Contraseña</label><input class="form-control" type="password" id="password" name="password" required></div>
<button class="btn btn-primary btn-block" type="submit">Registrarme</button></form>
<p class="text-center mt-3 mb-0"><a href="<?= url('login') ?>">Volver al login</a></p>
</div></div></div></div></div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
