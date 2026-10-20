<?php
require_once __DIR__ . '/../utils/auth.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet"
          href="[maxcdn.bootstrapcdn.com](https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css)">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/pages/dashboard.php">Workshop 3</a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="/pages/profile.php">Perfil</a>
        <a class="nav-item nav-link" href="/pages/courses.php">Cursos</a>
        <form action="/actions/logout.php" method="POST" class="form-inline">
            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body p-4">
                    <h2 class="page-title">Bienvenido</h2>
                    <p class="mb-1">
                        Hola,
                        <strong><?= h($_SESSION['name'] ?? $_SESSION['username'] ?? 'Usuario') ?></strong>.
                    </p>
                    <p class="text-muted mb-4">
                        Desde aquí puedes acceder a tus cursos.
                    </p>
                    <a href="/pages/courses.php" class="btn btn-primary">
                        Ver Cursos
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
