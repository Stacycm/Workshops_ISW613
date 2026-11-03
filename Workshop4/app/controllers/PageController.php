<?php
class PageController {
    public function dashboard(): void { requireLogin(); view('pages/dashboard'); }
    public function profile(): void {
        requireLogin();
        global $conn;
        $user = (new User($conn))->findById((int)$_SESSION['user_id']);
        view('pages/profile', ['user' => $user]);
    }
}
