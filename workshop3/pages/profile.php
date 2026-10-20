<?php
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
requireLogin();

$stmt = $conn->prepare("SELECT id, username, name FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
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
        <div class="col-md-6">

            <h2 class="page-title mb-4">Mi Perfil</h2>

            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th class="text-muted w-25">Usuario</th>
                            <td><?= h($user['username'] ?? '') ?></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Nombre</th>
                            <td><?= h($user['name'] ?? '') ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <a href="/pages/courses.php"
               class="btn btn-secondary mt-3">Volver a Cursos</a>

        </div>
    </div>
</div>

</body>
</html>

