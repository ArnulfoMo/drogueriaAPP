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

Para que las fotografías de los medicamentos se visualicen correctamente, es hay que habilitar el almacenamiento publico.

Después de extraer el archivo ZIP y abrir el proyecto en la terminal, ejecutar:

```bash
php artisan storage:link
```

Este comando permite acceder a las imágenes guardadas en `storage/app/public` desde el navegador.

**Nota:** Si aparece el mensaje `The public/storage link already exists` y las imágenes no se muestran, verificar si `public/storage` es una carpeta normal en lugar de un enlace.

En Windows (PowerShell), ejecutar:

```powershell
Get-Item public\storage | Format-List LinkType,Target
```

Si `LinkType` aparece vacío

```powershell
Remove-Item public\storage -Recurse -Force
```

Luego crear nuevamente el enlace:

```bash
php artisan storage:link
```

Finalmente, iniciar el servidor:

```bash
php artisan serve
```

Abrir el proyecto en:

http://127.0.0.1:8000

Con esto, las fotografías de los medicamentos deberían visualizarse correctamente.


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
