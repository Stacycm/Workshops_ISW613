<?php
function view(string $name, array $data = []): void {
    extract($data, EXTR_SKIP);
    require __DIR__ . '/../views/' . $name . '.php';
}
function redirect(string $route): never {
    // Admite parámetros internos como "login&error=invalid".
    [$name, $query] = array_pad(explode('&', $route, 2), 2, null);
    $destination = url($name);
    if ($query !== null) $destination .= '&' . $query;
    header('Location: ' . $destination);
    exit;
}
function url(string $route, array $params = []): string {
    return BASE_URL . '/index.php?' . http_build_query(array_merge(['route' => $route], $params));
}
function h($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
function requireLogin(): void {
    if (empty($_SESSION['user_id'])) redirect('login');
}
function csrfToken(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function csrfField(): string {
    return '<input type="hidden" name="csrf" value="' . h(csrfToken()) . '">';
}
function verifyCsrf(): void {
    $sent = $_POST['csrf'] ?? '';
    if (!$sent || !hash_equals($_SESSION['csrf'] ?? '', $sent)) {
        http_response_code(419);
        exit('Token CSRF inválido. Recargue la página.');
    }
}
