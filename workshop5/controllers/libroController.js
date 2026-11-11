
const Libro = require('../models/Libro');

// Mostrar todos los libros
const listar = (req, res) => {
    Libro.obtenerTodos((error, libros) => {
        if (error) {
            return res.status(500).send('Error al obtener los libros');
        }

        res.render('libros', { libros });
    });
};

// Mostrar formulario para crear un libro
const mostrarCrear = (req, res) => {
    res.render('crear');
};

// Guardar un nuevo libro
const guardar = (req, res) => {
    const libro = {
        titulo: req.body.titulo,
        autor: req.body.autor,
        genero: req.body.genero,
        anio_publicacion: req.body.anio_publicacion
    };

    Libro.crear(libro, (error) => {
        if (error) {
            return res.status(500).send('Error al guardar el libro');
        }

        res.redirect('/libros');
    });
};

// Mostrar formulario para editar
const mostrarEditar = (req, res) => {
    const id = req.params.id;

    Libro.obtenerPorId(id, (error, libros) => {
        if (error) {
            return res.status(500).send('Error al buscar el libro');
        }

        if (libros.length === 0) {
            return res.status(404).send('Libro no encontrado');
        }

        res.render('editar', { libro: libros[0] });
    });
};

// Actualizar un libro
const actualizar = (req, res) => {
    const id = req.params.id;

    const libro = {
        titulo: req.body.titulo,
        autor: req.body.autor,
        genero: req.body.genero,
        anio_publicacion: req.body.anio_publicacion
    };

    Libro.actualizar(id, libro, (error) => {
        if (error) {
            return res.status(500).send('Error al actualizar el libro');
        }

        res.redirect('/libros');
    });
};

// Eliminar un libro
const eliminar = (req, res) => {
    const id = req.params.id;

    Libro.eliminar(id, (error) => {
        if (error) {
            return res.status(500).send('Error al eliminar el libro');
        }

        res.redirect('/libros');
    });
};

// Exportar funciones
module.exports = {
    listar,
    mostrarCrear,
    guardar,
    mostrarEditar,
    actualizar,
    eliminar
};
