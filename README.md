# DISFARMA Honduras

Sistema web desarrollado con **Laravel y MySQL** para la administración de una droguería.

## Funcionalidades

El sistema permite realizar las siguientes operaciones:

- **Autenticación:** registro de usuarios, inicio y cierre de sesión.
- **Medicamentos:** registrar, consultar, editar, eliminar y buscar medicamentos, incluyendo sus fotografías.
- **Proveedores:** registrar y administrar proveedores y sus condiciones de crédito.
- **Empleados:** registrar y administrar la información del personal.
- **Dashboard:** visualizar el total de medicamentos, proveedores activos, empleados y valor total del inventario.

## Requisitos

Para ejecutar el proyecto es necesario tener instalado:

- XAMPP (Apache y MySQL).
- PHP.
- Composer.

## Pasos para ejecutar el proyecto

### 1. Abrir el proyecto

**Opción 1: Archivo ZIP**

Descomprimir el archivo ZIP y abrir la carpeta del proyecto en Visual Studio Code.

**Opción 2: GitHub**

Repositorio:

https://github.com/ArnulfoMo/drogueriaAPP

```bash
git clone https://github.com/ArnulfoMo/drogueriaAPP.git
```

### 2. Iniciar XAMPP

Abrir XAMPP y activar los servicios **Apache** y **MySQL**.

### 3. Crear la base de datos

Ingresar a phpMyAdmin desde:

http://localhost/phpmyadmin

Crear una base de datos vacía con el nombre:

`drogueriaAPP`

### 4. Crear las tablas y cargar los datos de prueba

Ejecutar:

```bash
php artisan migrate
php artisan db:seed
```

### 5. Habilitar las imágenes

Ejecutar:

```bash
php artisan storage:link
```

### 6. Iniciar el proyecto

Ejecutar:

```bash
php artisan serve
```

Abrir en el navegador:

http://127.0.0.1:8000

### 7. Usuario de prueba

**Credenciales de acceso:**

- **Nombre:** Admistrador
- **Correo:** admin@disfarma.hn
- **Contraseña:** admin123.

También es posible registrar nuevos usuarios con correos terminados en `@disfarma.hn`.

## Acceso al sistema

Al ingresar por primera vez:

1. Seleccionar la opción **Registrarse**.
2. Crear una cuenta utilizando un correo institucional terminado en `@disfarma.hn`.
3. Iniciar sesión con el correo y contraseña registrados.
