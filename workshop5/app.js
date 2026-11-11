const express = require('express');
const conexion = require('./config/database');
const methodOverride = require('method-override');

const app = express();

const PORT = 3000;

// Configurar EJS
app.set('view engine', 'ejs');

// Recibir datos de formularios
app.use(express.urlencoded({ extended: true }));

// Permitir utilizar PUT y DELETE
app.use(methodOverride('_method'));

// Archivos estáticos
app.use(express.static('public'));

// Importar rutas
const libroRoutes = require('./routes/libroRoutes');

// Utilizar rutas
app.use('/', libroRoutes);

// Página principal
app.get('/', (req, res) => {
    res.redirect('/libros');
});

// Iniciar servidor
app.listen(PORT, () => {
    console.log(`Servidor funcionando en http://localhost:${PORT}`);
});
