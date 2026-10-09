# Workshop 2 - Sistema de gestión de usuarios

## Descripción del proyecto

Este proyecto es una aplicación web desarrollada con PHP y MySQL que permite registrar usuarios, iniciar sesión, consultar la información del perfil, actualizar datos personales y cerrar sesión.

La interfaz utiliza Bootstrap para mejorar la apariencia y facilitar la navegación.

## Tecnologías utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 4
- XAMPP

## Funcionalidades

- Registro de usuarios.
- Validación de inicio de sesión.
- Almacenamiento de contraseñas mediante hash.
- Visualización de la información del perfil.
- Actualización del nombre, correo electrónico y provincia.
- Cierre de sesión.
- Protección de las páginas del perfil mediante sesiones.

## Estructura del proyecto

```text
workshop2/
├── conexion.php
├── registro.php
├── login.php
├── perfil.php
├── actualizar.php
├── logout.php
└── README.md
```

## Base de datos

Nombre de la base de datos: `workshop2`

### Tabla `usuarios`

Almacena la información de los usuarios registrados:

- `id`: identificador del usuario.
- `nombre`: nombre completo.
- `username`: nombre de usuario.
- `correo`: correo electrónico.
- `password`: contraseña almacenada mediante hash.
- `provincia_id`: identificador de la provincia.

### Tabla `provincias`

Almacena las provincias de Costa Rica para que el usuario pueda seleccionar la correspondiente durante el registro o la actualización de su perfil.

## Instalación y ejecución

1. Instalar XAMPP.
2. Iniciar los servicios Apache y MySQL desde el panel de control de XAMPP.
3. Colocar la carpeta `workshop2` dentro de `C:\xampp\htdocs`.
4. Crear la base de datos `workshop2` en phpMyAdmin.
5. Crear las tablas `usuarios` y `provincias`, incluyendo sus campos y la relación entre ambas.
6. Verificar que `conexion.php` utilice la base de datos `workshop2`.
7. Abrir el proyecto en el navegador:

   - `http://localhost/workshop2/registro.php`
   - `http://workshop2.test/`

## Archivos principales

- **`conexion.php`:** establece la conexión con la base de datos.
- **`registro.php`:** permite registrar nuevos usuarios.
- **`login.php`:** valida las credenciales e inicia la sesión.
- **`perfil.php`:** muestra la información del usuario autenticado.
- **`actualizar.php`:** permite modificar ciertos datos del perfil.
- **`logout.php`:** cierra la sesión activa.

## Usuario de prueba

Para probar la aplicación, se puede utilizar el perfil de prueba que ya está registrado en la base de datos.

- **`Usuario`:** juanita
- **`contraseña`:** 123456789

