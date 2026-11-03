<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($title ?? 'Gestión de cursos') ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css">
</head>
<body>
<?php if (!empty($_SESSION['user_id'])): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= url('dashboard') ?>">Workshop 4</a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?= url('profile') ?>">Perfil</a>
        <a class="nav-item nav-link" href="<?= url('courses') ?>">Cursos</a>
        <form action="<?= url('logout') ?>" method="POST" class="form-inline">
            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
        </form>
    </div>
</nav>
<?php endif; ?>
