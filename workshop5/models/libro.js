
const conexion = require('../config/database');

// Obtener todos los libros
const obtenerTodos = (callback) => {
    conexion.query('SELECT * FROM libros', callback);
};

// Buscar un libro por su ID
const obtenerPorId = (id, callback) => {
    conexion.query(
        'SELECT * FROM libros WHERE id = ?',
        [id],
        callback
    );
};

// Crear un libro
const crear = (libro, callback) => {
    conexion.query(
        'INSERT INTO libros (titulo, autor, genero, anio_publicacion) VALUES (?, ?, ?, ?)',
        [
            libro.titulo,
            libro.autor,
            libro.genero,
            libro.anio_publicacion
        ],
        callback
    );
};

// Actualizar un libro
const actualizar = (id, libro, callback) => {
    conexion.query(
        'UPDATE libros SET titulo = ?, autor = ?, genero = ?, anio_publicacion = ? WHERE id = ?',
        [
            libro.titulo,
            libro.autor,
            libro.genero,
            libro.anio_publicacion,
            id
        ],
        callback
    );
};

// Eliminar un libro
const eliminar = (id, callback) => {
    conexion.query(
        'DELETE FROM libros WHERE id = ?',
        [id],
        callback
    );
};

// Exportar funciones
module.exports = {
    obtenerTodos,
    obtenerPorId,
    crear,
    actualizar,
    eliminar
};
