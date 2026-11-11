
const express = require('express');

const router = express.Router();

const libroController = require('../controllers/libroController');

// Mostrar todos los libros
router.get('/libros', libroController.listar);

// Mostrar formulario de creación
router.get('/libros/crear', libroController.mostrarCrear);

// Guardar un libro
router.post('/libros', libroController.guardar);

// Mostrar formulario de edición
router.get('/libros/editar/:id', libroController.mostrarEditar);

// Actualizar un libro
router.put('/libros/:id', libroController.actualizar);

// Eliminar un libro
router.delete('/libros/:id', libroController.eliminar);

module.exports = router;
