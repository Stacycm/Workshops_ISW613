<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/dashboard.php');
    exit;
}

$_SESSION = [];
session_destroy();

header('Location: /index.php');
exit;
