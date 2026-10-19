<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /workshop3/pages/dashboard.php');
    exit;
}

$_SESSION = [];
session_destroy();

header('Location: /workshop3/index.php');
exit;
