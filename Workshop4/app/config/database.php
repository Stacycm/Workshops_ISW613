<?php
// Configuración local de MySQL (XAMPP por defecto).
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'workshop3';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    http_response_code(500);
    exit('No fue posible conectar con la base de datos. Revise app/config/database.php.');
}
$conn->set_charset('utf8mb4');
