<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <?php if (isset($_GET['error'])): ?>
        <p>Credenciales inválidas</p>
    <?php endif; ?>

    <form action="login.php" method="POST">

        <label>Usuario:</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">Ingresar</button>

    </form>

</body>
</html>
