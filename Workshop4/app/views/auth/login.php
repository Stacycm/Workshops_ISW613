<?php $title = 'Iniciar sesión'; require __DIR__ . '/../layout/header.php'; ?>
<div class="container auth">
  <div class="row justify-content-center"><div class="col-md-6">
    <div class="card"><div class="card-header text-center"><h4 class="mb-0">Iniciar sesión</h4></div><div class="card-body">
      <?php if ($ok === 'registered'): ?><div class="alert alert-success">Usuario registrado. Ya puedes iniciar sesión.</div><?php endif; ?>
      <?php if ($error === 'invalid'): ?><div class="alert alert-danger">Usuario o contraseña incorrectos.</div><?php endif; ?>
      <form action="<?= url('login') ?>" method="POST">
        <div class="form-group"><label for="username">Usuario</label><input class="form-control" id="username" name="username" required></div>
        <div class="form-group"><label for="password">Contraseña</label><input class="form-control" type="password" id="password" name="password" required></div>
        <button class="btn btn-primary btn-block" type="submit">Iniciar sesión</button>
      </form>
      <p class="text-center mt-3 mb-0">¿No tienes cuenta? <a href="<?= url('register') ?>">Regístrate</a></p>
    </div></div>
  </div></div>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
