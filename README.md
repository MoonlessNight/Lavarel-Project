# Inventario Laravel (Laravel-Project)

Este es un proyecto de prueba desarrollado en Laravel con el objetivo de comprender su funcionamiento, arquitectura y el diseño de APIs RESTful aplicadas a un sistema de gestión de inventarios.

---

## 🛠️ Comandos Esenciales del Proyecto

A continuación se listan los comandos principales utilizados para configurar y trabajar en este proyecto:

*   **Instalación de dependencias de PHP:**
    ```bash
    composer install
    ```
    *Nota: Se removieron los paquetes de frontend (NPM/Vite) al reorientar el proyecto hacia una API Backend.*

*   **Generación de la clave de aplicación:**
    ```bash
    php artisan key:generate
    ```
    Genera la clave única en el archivo `.env` requerida para la seguridad del framework.

*   **Ejecución de migraciones de Base de Datos:**
    ```bash
    php artisan migrate
    ```
    Crea las tablas en la base de datos a partir de los archivos de migración definidos.

*   **Instalación de Laravel Breeze (Autenticación):**
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    ```
    Instala el andamiaje (scaffold) de autenticación inicial.

*   **Creación del Módulo de Categorías:**
    ```bash
    php artisan make:model Categoria -mcr
    ```
    Crea el modelo `Categoria` junto con su migración (`-m`), controlador con métodos de recurso (`-c`) y habilitación para el ruteo de recursos (`-r`).

---

## 📋 Historial de Versiones

### 🏷️ v1.4.0 (Versión Actual)
En esta versión se re-integró el frontend utilizando el motor de plantillas Blade de Laravel, transformando el proyecto de una API RESTful a una aplicación web tradicional con interfaces de usuario completas y control de acceso basado en roles.

**Cambios principales desde v1.3.0:**
*   **Frontend con Blade:** Creación de layouts, vistas de autenticación, perfil, categorías, subcategorías, productos y usuarios en `resources/views`.
*   **Autenticación Web y Sesiones:** Configuración de rutas y controladores para flujos de autenticación basados en sesión tradicional (Login, Register, Forgot/Reset Password, etc.).
*   **Seguridad y Roles:** Implementación y registro de los middlewares `admin` y `coordinador` para autorizar operaciones CRUD en los controladores principales (restringiendo la eliminación para coordinadores).
*   **Kernel HTTP:** Creación de la clase `Kerbn` (`Kernel.php`) para registrar los middlewares personalizados y gestionar el flujo de peticiones.

### 🏷️ v1.3.0
En esta versión se implementaron los controladores para la autenticación basada en API mediante tokens (Laravel Sanctum) y la gestión del perfil de usuario.

**Cambios principales desde v1.2.0:**
*   **Autenticación API:** Creación de [ApiSuthController.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/app/Http/Controllers/ApiSuthController.php) con soporte para inicio de sesión (`login`), cierre de sesión (`logout`) y consulta del usuario actual (`me`) a través de tokens de API.
*   **Gestión de Perfil:** Creación del controlador [ProfileController.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/app/Http/Controllers/ProfileController.php) para la consulta, actualización y eliminación de la cuenta de usuario.

### 🏷️ v1.2.0
En esta versión se expandieron las capacidades del sistema agregando la lógica de control para los módulos de subcategorías, productos y la administración básica de usuarios.

**Cambios principales desde v1.1.0:**
*   **Módulo de Subcategorías:** Implementación de [SubcategoriaController.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/app/Http/Controllers/SubcategoriaController.php) para organizar y gestionar subcategorías enlazadas a categorías.
*   **Módulo de Productos:** Implementación de [ProductoController.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/app/Http/Controllers/ProductoController.php) (clase `ProductosController`) para gestionar el inventario de productos.
*   **Módulo de Usuarios:** Implementación de [UserController.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/app/Http/Controllers/UserController.php) con soporte de roles (`admin`, `coordinador`) y corrección de un error de sintaxis en el método `destroy`.
*   **Ruteo de Recursos:** Registro de las rutas CRUD correspondientes en [web.php](file:///c:/Users/Administrador/Documents/GitHub/Lavarel-Project/inventario-laravel/routes/web.php).

### 🏷️ v1.1.0
En esta versión se reorientó el proyecto para funcionar exclusivamente como una **API RESTful de Backend**, eliminando el frontend por defecto y preparando la base para la gestión de inventario.

**Cambios principales desde v1.0.0:**
*   **Limpieza de Frontend:** Se eliminó el andamiaje inicial de React e Inertia.js (incluyendo `package.json`, Vite, componentes de React y layouts visuales) para aligerar el proyecto y dejarlo como una API limpia.
*   **Configuración de API y Seguridad:**
    *   Habilitación y configuración de rutas API en [routes/api.php](file:///c:/Users/SENA/Desktop/Github/Lavarel-Project/inventario-laravel/routes/api.php).
    *   Configuración de políticas CORS en [config/cors.php](file:///c:/Users/SENA/Desktop/Github/Lavarel-Project/inventario-laravel/config/cors.php).
    *   Soporte para autenticación con tokens usando Laravel Sanctum en [config/sanctum.php](file:///c:/Users/SENA/Desktop/Github/Lavarel-Project/inventario-laravel/config/sanctum.php).
*   **Estructuración del Inventario:** Creación del modelo, migración y controlador para gestionar las **Categorías** del inventario ([Categoria.php](file:///c:/Users/SENA/Desktop/Github/Lavarel-Project/inventario-laravel/app/Models/Categoria.php)).

### 🏷️ v1.0.0
*   Inicialización del proyecto.
*   Instalación básica de dependencias y andamiaje inicial (Laravel Breeze).
