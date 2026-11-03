<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('workshop4.test', '/Workshop4'); // 

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/CourseController.php';
require_once __DIR__ . '/../controllers/PageController.php';
