# 📚 BookSpace – Biblioteca Digital

## 1. Descripción del proyecto

BookSpace es una aplicación web desarrollada para gestionar una colección de libros. Permite registrar, consultar, editar y eliminar información de los libros almacenados en una base de datos.

El proyecto fue desarrollado utilizando Node.js y Express, aplicando el patrón de arquitectura MVC (Modelo-Vista-Controlador), con el objetivo de organizar el código en diferentes archivos y facilitar su mantenimiento.

## 2. Objetivos

- Desarrollar una aplicación web para administrar libros.
- Implementar las operaciones CRUD (Crear, Leer, Actualizar y Eliminar).
- Conectar la aplicación con una base de datos MySQL.
- Aplicar el patrón de arquitectura MVC.
- Separar las responsabilidades del modelo, controlador y vistas.

## 3. Tecnologías utilizadas

- **Node.js:** Entorno de ejecución de JavaScript.
- **Express:** Framework para desarrollar aplicaciones web.
- **MySQL:** Sistema de gestión de bases de datos.
- **EJS:** Motor de plantillas para generar vistas dinámicas.
- **HTML5:** Estructura de las páginas web.
- **CSS3:** Diseño y estilos de la aplicación.
- **Method-Override:** Permite utilizar métodos PUT y DELETE desde formularios HTML.

## 4. Funcionalidades

El sistema cuenta con las siguientes funcionalidades:

| Funcionalidad | Descripción |
|---|---|
| Registrar libros | Permite agregar nuevos libros. |
| Consultar libros | Muestra los libros registrados en el sistema. |
| Editar libros | Permite modificar la información de un libro. |
| Eliminar libros | Permite eliminar libros con una confirmación. |

Cada libro contiene los siguientes datos:

- ID
- Título
- Autor
- Género
- Año de publicación

## 5. Arquitectura MVC

El proyecto utiliza el patrón Modelo-Vista-Controlador (MVC), que permite separar las responsabilidades de la aplicación.

- **Modelo (Model):** Se encarga de interactuar con la base de datos y ejecutar las consultas SQL.
- **Vista (View):** Presenta la información al usuario mediante archivos EJS.
- **Controlador (Controller):** Recibe las solicitudes, coordina las operaciones del modelo y selecciona las vistas que se deben mostrar.

## 6. Estructura del proyecto

```text
Workshop5/
│
├── config/
│   └── database.js
│
├── controllers/
│   └── libroController.js
│
├── models/
│   └── Libro.js
│
├── routes/
│   └── libroRoutes.js
│
├── views/
│   ├── libros.ejs
│   ├── crear.ejs
│   └── editar.ejs
│
├── public/
│   └── estilos.css
│
├── app.js
├── package.json
└── README.md
```

## 7. Base de datos

El proyecto utiliza MySQL y una base de datos llamada `workshop5`.

Para crear la base de datos y la tabla principal, se utiliza el siguiente código SQL:

```sql
CREATE DATABASE workshop5;

USE workshop5;

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    anio_publicacion INT NOT NULL
);
```

## 8. Instalación y ejecución

### Requisitos previos

- Node.js y npm instalados.
- XAMPP instalado.
- MySQL iniciado desde XAMPP.
- Un navegador web.

### Paso 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
```

### Paso 2. Ingresar a la carpeta del proyecto

```bash
cd Workshop5
```

### Paso 3. Instalar las dependencias

```bash
npm install
```

### Paso 4. Configurar la base de datos

Crear la base de datos `workshop5` y la tabla `libros` en phpMyAdmin.

Verificar que los datos de conexión en `config/database.js` coincidan con la configuración local de MySQL.

### Paso 5. Iniciar el servidor

```bash
node app.js
```

### Paso 6. Abrir la aplicación

Ingresar desde el navegador a:

```text
http://localhost:3000
```

## 9. Rutas principales

| Método HTTP | Ruta | Funcionalidad |
|---|---|---|
| GET | `/libros` | Mostrar todos los libros. |
| GET | `/libros/crear` | Mostrar formulario de registro. |
| POST | `/libros` | Guardar un nuevo libro. |
| GET | `/libros/editar/:id` | Mostrar formulario de edición. |
| PUT | `/libros/:id` | Actualizar un libro. |
| DELETE | `/libros/:id` | Eliminar un libro. |

## 10. Interfaz del sistema

La aplicación cuenta con una interfaz diseñada con CSS, utilizando una paleta de colores lavanda y morado.

Incluye una página principal con estadísticas de los libros registrados, una tabla para consultar la colección y formularios para registrar y editar información.

## 11. Autor

Proyecto académico desarrollado como parte del Workshop 5, con el propósito de poner en práctica el desarrollo de aplicaciones web utilizando Node.js, Express, MySQL y el patrón MVC.