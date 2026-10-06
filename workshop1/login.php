<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "workshop1";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$username = $_POST['username'];
$passwordUser = $_POST['password'];

$sql = "SELECT * FROM usuarios 
        WHERE username = '$username' 
        AND password = '$passwordUser'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    header("Location: usuario_existe.php");
    exit();

} else {

    header("Location: index.php?error=1");
    exit();

}

$conn->close();

?>