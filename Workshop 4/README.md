# Workshop 4 — Refactorización con patrón MVC

Aplicación PHP y MySQL para autenticación y gestión de cursos, reorganizada desde Workshop 3 para separar Modelo, Vista y Controlador.

## Arquitectura MVC

- **Modelos (`app/models`)**: `User.php` y `Course.php`. Contienen exclusivamente el acceso y las operaciones de datos.
- **Vistas (`app/views`)**: plantillas HTML/PHP. Presentan la información y los formularios, sin consultas SQL.
- **Controladores (`app/controllers`)**: reciben las solicitudes, coordinan modelos y vistas, validan datos y deciden las redirecciones.
- **Configuración y núcleo (`app/config`, `app/core`)**: conexión a MySQL, carga de clases, funciones comunes, sesiones y protección CSRF.
- **`index.php`**: controlador frontal; enruta las solicitudes a los controladores.
- **`assets`**: archivos estáticos.

## Estructura

```text
Workshop 4/
├── app/
│   ├── config/
│   │   ├── bootstrap.php
│   │   └── database.php
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── CourseController.php
│   │   └── PageController.php
│   ├── core/
│   │   └── helpers.php
│   ├── models/
│   │   ├── Course.php
│   │   └── User.php
│   └── views/
│       ├── auth/
│       ├── courses/
│       ├── layout/
│       └── pages/
├── assets/css/styles.css
├── database/workshop3.sql
├── index.php
├── .gitignore
└── README.md
```





