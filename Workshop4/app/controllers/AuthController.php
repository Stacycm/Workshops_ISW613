<?php
class AuthController {
    private User $users;
    public function __construct() { global $conn; $this->users = new User($conn); }

    public function showLogin(): void {
        if (!empty($_SESSION['user_id'])) redirect('dashboard');
        view('auth/login', ['error' => $_GET['error'] ?? '', 'ok' => $_GET['ok'] ?? '']);
    }
    public function login(): void {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $user = $this->users->findByUsername($username);
        if (!$user || !password_verify($password, $user['password'])) redirect('login&error=invalid');
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        redirect('dashboard');
    }
    public function showRegister(): void { view('auth/register', ['error' => $_GET['error'] ?? '']); }
    public function register(): void {
        $name = trim($_POST['name'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if ($name === '' || $username === '' || $password === '') redirect('register&error=empty');
        if ($this->users->findByUsername($username)) redirect('register&error=exists');
        try {
            if ($this->users->create($name, $username, $password)) redirect('login&ok=registered');
        } catch (mysqli_sql_exception $e) {
            redirect('register&error=register');
        }
        redirect('register&error=register');
    }
    public function logout(): void {
        $_SESSION = [];
        session_destroy();
        redirect('login');
    }
}
