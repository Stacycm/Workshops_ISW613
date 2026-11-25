# Quiz 3 – Sistema de Gestión de Cursos y Matrícula

## Descripción del proyecto

Este proyecto consiste en un sistema web desarrollado con **CodeIgniter 4**, utilizando el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**.

El sistema permite administrar cursos y registrar matrículas de estudiantes. Además, muestra un comprobante con la información de cada matrícula realizada.

## Tecnologías utilizadas

- PHP 8.2
- CodeIgniter 4.7.6
- MySQL / MariaDB
- HTML5
- CSS3
- Bootstrap 5.3.3
- Composer

## Funcionalidades

### 1. Gestión de cursos (CRUD)

El sistema permite:

- Registrar nuevos cursos.
- Consultar los cursos existentes.
- Editar la información de un curso.
- Eliminar cursos.

Cada curso contiene los siguientes datos:

- Nombre del curso.
- Código del curso.
- Cantidad de créditos.
- Carrera a la que pertenece.

Las carreras se almacenan en la base de datos y se utilizan para relacionarlas con los cursos.

### 2. Matrícula de estudiantes

El sistema permite:

- Consultar los cursos disponibles para matrícula.
- Ingresar el nombre del estudiante.
- Ingresar el número de identificación.
- Seleccionar un curso.
- Registrar la matrícula en la base de datos.
- Visualizar un comprobante con los datos de la matrícula.

El comprobante muestra el número de matrícula, los datos del estudiante, el curso seleccionado, la carrera, los créditos y la fecha de registro.

## Estructura del proyecto

El proyecto utiliza la arquitectura MVC de CodeIgniter 4:

- **Models:** gestionan la interacción con la base de datos.
- **Views:** contienen las interfaces que se muestran al usuario.
- **Controllers:** procesan las solicitudes y conectan los modelos con las vistas.

Archivos principales:

- `app/Controllers/CursoController.php`: controla las operaciones del CRUD de cursos.
- `app/Controllers/MatriculaController.php`: controla el proceso de matrícula.
- `app/Models/CarreraModel.php`: administra los datos de las carreras.
- `app/Models/CursoModel.php`: administra los datos de los cursos.
- `app/Models/MatriculaModel.php`: administra los registros de matrícula.
- `app/Views/cursos/`: contiene las vistas del CRUD de cursos.
- `app/Views/matriculas/`: contiene las vistas del formulario de matrícula y el comprobante.
- `app/Config/Routes.php`: define las rutas del sistema.

## Base de datos

La base de datos utilizada se llama `quiz3` y contiene las siguientes tablas:

| Tabla | Descripción |
|---|---|
| `carreras` | Almacena las carreras disponibles. |
| `cursos` | Almacena los cursos y su relación con las carreras. |
| `matriculas` | Almacena las matrículas realizadas. |

Se utilizaron migraciones para crear las tablas y seeders para insertar datos iniciales de carreras y cursos.

## Requisitos para ejecutar el proyecto

- PHP 8.2 o superior.
- Composer.
- MySQL o MariaDB.
- Servidor local como XAMPP.
- Git (opcional, para clonar el repositorio).

## Instalación y ejecución

### 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
```

### 2. Ingresar a la carpeta del proyecto

```bash
cd quiz3
```

### 3. Instalar las dependencias

```bash
composer install
```

### 4. Configurar el entorno

Copiar el archivo `env` y crear una copia llamada `.env`.

En Windows PowerShell:

```powershell
Copy-Item env .env
```

Configurar en `.env` los datos de conexión a la base de datos:

```ini
database.default.hostname = localhost
database.default.database = quiz3
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

También configurar la dirección base de la aplicación:

```ini
app.baseURL = 'http://localhost:8080/'
```

**Nota:** Los datos de conexión pueden variar dependiendo de la configuración local de cada equipo.

### 5. Crear la base de datos

Desde phpMyAdmin, crear una base de datos llamada:

```sql
quiz3
```

### 6. Ejecutar las migraciones

Desde la terminal, ejecutar:

```bash
php spark migrate
```

### 7. Insertar los datos iniciales

Ejecutar los seeders:

```bash
php spark db:seed CarreraSeeder
php spark db:seed CursoSeeder
```

### 8. Iniciar el servidor

Ejecutar:

```bash
php spark serve
```

Abrir en el navegador:

```text
http://localhost:8080/
```

## Autor

Proyecto desarrollado como parte de la evaluación Quiz 3 del curso Programación en Ambiente Web I.