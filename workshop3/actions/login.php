<?php
session_start();

require_once __DIR__ . '/../utils/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /workshop3/index.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header('Location: /workshop3/index.php?error=empty');
    exit;
}

$stmt = $conn->prepare(
    "SELECT id, username, name, password FROM users WHERE username = ? LIMIT 1"
);
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || !password_verify($password, $user['password'])) {
    header('Location: /workshop3/index.php?error=credentials');
    exit;
}

session_regenerate_id(true);

$_SESSION['user_id']  = (int)$user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['name']     = $user['name'];

header('Location: /workshop3/pages/dashboard.php');
exit;
