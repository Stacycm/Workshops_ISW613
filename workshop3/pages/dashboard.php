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
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="/Workshop3/pages/dashboard.php">
        Workshop 3
    </a>

    <div class="navbar-nav">

        <a class="nav-item nav-link"
           href="/workshop3/pages/profile.php">
            Perfil
        </a>

        <a class="nav-item nav-link"
           href="/workshop3/pages/courses.php">
            Cursos
        </a>

        <form action="/workshop3/actions/logout.php"
              method="POST"
              class="form-inline">

            <button type="submit" class="btn btn-link nav-link">
                Cerrar sesión
            </button>

        </form>

    </div>

</nav>

<div class="container mt-5">

    <h1>Bienvenido</h1>

    <p>
        Hola,
        <?php echo htmlspecialchars($_SESSION['name']); ?>.
    </p>

    <p>
        Desde aquí puedes acceder a tus cursos.
    </p>

</div>

</body>

</html>