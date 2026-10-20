# Workshop 3 - Sistema de gestión de cursos

## Descripción del proyecto

Este proyecto es una aplicación web desarrollada con PHP y MySQL que permite a los usuarios iniciar sesión, consultar la información de su perfil y gestionar los cursos registrados en la base de datos.

La aplicación permite crear, consultar, editar y eliminar cursos, así como navegar entre las diferentes secciones mediante un menú de navegación.

## Tecnologías utilizadas

- PHP
- MySQL / MariaDB
- HTML5
- CSS3
- XAMPP
- Git y GitHub

## Funcionalidades

- Inicio de sesión de usuarios.
- Registro de usuarios.
- Almacenamiento de contraseñas mediante hash.
- Control de acceso mediante sesiones.
- Visualización del perfil del usuario.
- Menú de navegación para acceder al perfil, cerrar sesión e ingresar a Cursos.
- Visualización de los cursos existentes en formato de tabla.
- Creación de nuevos cursos.
- Edición de los cursos registrados.
- Eliminación de cursos mediante solicitudes POST.
- Asociación de cada curso con una carrera.
- Redirección al listado de cursos después de crear un curso.

Cada curso contiene los siguientes atributos:

- Nombre.
- Código de curso.
- ID de la carrera.
- Créditos.
- Descripción del curso.

## Estructura del proyecto

```text
Workshop 3/
├── actions/
│   ├── course_create.php
│   ├── course_delete.php
│   ├── course_edit.php
│   ├── login.php
│   ├── logout.php
│   └── register.php
│
├── assets/
│   └── css/
│       └── styles.css
│
├── pages/
│   ├── course_form.php
│   ├── courses.php
│   ├── dashboard.php
│   ├── profile.php
│   └── register_form.php
│
├── utils/
│   ├── auth.php
│   └── database.php
│
├── index.php
├── workshop3.sql
└── README.md
```

## Base de datos

Nombre de la base de datos: `workshop3`

### Tabla `users`

Almacena la información de los usuarios registrados:

- `id`: identificador del usuario.
- `username`: nombre de usuario único.
- `password`: contraseña almacenada mediante hash.
- `name`: nombre del usuario.
- `created_at`: fecha y hora de creación del registro.

### Tabla `carreras`

Almacena las carreras disponibles para asociarlas con los cursos:

- `id`: identificador de la carrera.
- `nombre`: nombre de la carrera.

### Tabla `cursos`

Almacena la información de los cursos registrados:

- `id`: identificador del curso.
- `nombre`: nombre del curso.
- `codigo_curso`: código único del curso.
- `carrera_id`: identificador de la carrera asociada.
- `creditos`: cantidad de créditos del curso.
- `descripcion`: descripción del curso.
- `created_at`: fecha y hora de creación del registro.

La tabla `cursos` tiene una clave foránea llamada `carrera_id`, que establece una relación con el campo `id` de la tabla `carreras`. Además, el código de cada curso debe ser único.

El archivo `workshop3.sql` contiene la estructura de las tablas, sus relaciones y algunos registros iniciales de usuarios, carreras y cursos.

## Instalación y ejecución

1. Instalar XAMPP.
2. Iniciar los servicios Apache y MySQL desde el panel de control de XAMPP.
3. Colocar la carpeta `Workshop 3` dentro de `C:\xampp\htdocs\`.
4. Abrir phpMyAdmin desde el navegador: `http://localhost/phpmyadmin`.
5. Importar el archivo `workshop3.sql` para crear las tablas y cargar los datos iniciales de la base de datos `workshop3`.
6. Verificar que el archivo `utils/database.php` utilice las credenciales correctas para conectarse a MySQL.
7. Abrir el proyecto en el navegador:

   - `http://localhost/Workshop3/`
   - `http://Workshop3.test/`

   Si se utiliza un VirtualHost, ingresar mediante el dominio local configurado.

## Archivos principales

- **`index.php`**: página inicial de la aplicación.
- **`actions/login.php`**: procesa el inicio de sesión y valida las credenciales.
- **`actions/register.php`**: procesa el registro de nuevos usuarios.
- **`actions/logout.php`**: cierra la sesión activa.
- **`pages/dashboard.php`**: muestra el panel principal de la aplicación.
- **`pages/profile.php`**: muestra la información del perfil del usuario.
- **`pages/courses.php`**: muestra el listado de cursos y las opciones para editarlos o eliminarlos.
- **`pages/course_form.php`**: contiene el formulario para crear o editar cursos.
- **`actions/course_create.php`**: procesa la creación de nuevos cursos.
- **`actions/course_edit.php`**: procesa la modificación de los cursos existentes.
- **`actions/course_delete.php`**: procesa la eliminación de cursos mediante el método POST.
- **`utils/auth.php`**: contiene las funciones relacionadas con la autenticación y el control de acceso.
- **`utils/database.php`**: establece la conexión con la base de datos.
- **`assets/css/styles.css`**: contiene los estilos de la aplicación.

## Usuario de prueba

Para probar la aplicación, se puede utilizar el usuario incluido en la base de datos:

- **Usuario:** `pedritovm`
- **Contraseña:** `12345`

