<?php
class Course {
    public function __construct(private mysqli $db) {}

    public function all(): array {
        $sql = 'SELECT c.id, c.nombre, c.codigo_curso, c.carrera_id, c.creditos,
                       c.descripcion, ca.nombre AS carrera
                FROM cursos c INNER JOIN carreras ca ON ca.id = c.carrera_id
                ORDER BY c.nombre';
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id): ?array {
        $stmt = $this->db->prepare('SELECT * FROM cursos WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function careers(): array {
        return $this->db->query('SELECT id, nombre FROM carreras ORDER BY nombre')->fetch_all(MYSQLI_ASSOC);
    }

    public function create(array $data): bool {
        $stmt = $this->db->prepare('INSERT INTO cursos (nombre, codigo_curso, carrera_id, creditos, descripcion) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('ssiis', $data['nombre'], $data['codigo_curso'], $data['carrera_id'], $data['creditos'], $data['descripcion']);
        return $stmt->execute();
    }

    public function update(int $id, array $data): bool {
        $stmt = $this->db->prepare('UPDATE cursos SET nombre=?, codigo_curso=?, carrera_id=?, creditos=?, descripcion=? WHERE id=?');
        $stmt->bind_param('ssiisi', $data['nombre'], $data['codigo_curso'], $data['carrera_id'], $data['creditos'], $data['descripcion'], $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM cursos WHERE id=?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
