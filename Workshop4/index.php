<?php
// Punto de entrada único (Front Controller).
require_once __DIR__ . '/app/config/bootstrap.php';

$route = $_GET['route'] ?? 'login';
$method = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case 'login':
        $method === 'POST' ? (new AuthController())->login() : (new AuthController())->showLogin();
        break;
    case 'register':
        $method === 'POST' ? (new AuthController())->register() : (new AuthController())->showRegister();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'dashboard':
        (new PageController())->dashboard();
        break;
    case 'profile':
        (new PageController())->profile();
        break;
    case 'courses':
        (new CourseController())->index();
        break;
    case 'course-create':
        $method === 'POST' ? (new CourseController())->store() : (new CourseController())->create();
        break;
    case 'course-edit':
        $method === 'POST' ? (new CourseController())->update() : (new CourseController())->edit();
        break;
    case 'course-delete':
        (new CourseController())->delete();
        break;
    default:
        http_response_code(404);
        echo 'Página no encontrada.';
}
