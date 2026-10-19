<?php
session_start();

require_once __DIR__ . '/../utils/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /workshop3/index.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$name     = trim($_POST['name'] ?? '');

if ($username === '' || $password === '' || $name === '') {
    header('Location: /workshop3/pages/register_form.php?error=empty');
    exit;
}

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    header('Location: /workshop3/pages/register_form.php?error=exists');
    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO users (username, password, name) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $username, $passwordHash, $name);

if ($stmt->execute()) {
    header('Location: /workshop3/index.php?success=registered');
    exit;
}

header('Location: /workshop3/pages/register_form.php?error=register');
exit;
