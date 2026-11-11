
const mysql = require('mysql2');

// Crear conexión con la base de datos
const conexion = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'workshop5'
});

// Conectar con MySQL
conexion.connect((error) => {
    if (error) {
        console.error('Error al conectar con MySQL:', error);
        return;
    }

    console.log('Conexión exitosa con MySQL');
});

// Exportar conexión
module.exports = conexion;
