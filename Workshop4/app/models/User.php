<?php
class User {
    public function __construct(private mysqli $db) {}

    public function findByUsername(string $username): ?array {
        $stmt = $this->db->prepare('SELECT id, username, password, name FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare('SELECT id, username, name FROM users WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function create(string $name, string $username, string $password): bool {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('INSERT INTO users (name, username, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $name, $username, $hash);
        return $stmt->execute();
    }
}
