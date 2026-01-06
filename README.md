# Desafío 1

### API RESTful: Gestión de Cursos y Estudiantes

Desarrollá una API RESTful para la gestión de una plataforma de cursos online.
La API debe permitir crear, leer, actualizar y eliminar (CRUD) cursos, estudiantes y la inscripción de estudiantes en cursos. Además, debe incluir autenticación básica y manejo robusto de excepciones.

#### Steps to run the project
1. Clone the repository:
   ```bash
   git clone
    ```
2. Navigate to the project directory:
   ```bash
   cd project-directory
   ```
3. Install dependencies using Composer:
   ```bash
   composer install
   ```
4. Set up the environment configuration:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure your database settings in the `.env` file.
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run database migrations:
    ```bash
    php artisan migrate
    ```
7. Start the development server:
   ```bash
   php artisan serve
   ```
8. Install sqlite3 if you don't have it already (for testing purposes):
   ```bash
   sudo apt-get install sqlite3
   ```
9. Run the tests:
   ```bash
   php artisan test
   ```
10. Access the Postman collection for testing the API endpoints:
   - https://documenter.getpostman.com/view/23629833/2sBXVeDrTz

#### Technical challenges
- [x] PHP: Versión 7.4 o superior
- [x] Composer: Para la gestión de dependencias
- [x] Framework: Preferiblemente Laravel (se aceptan Symfony, Slim, Lumen)
- [x] Namespaces: Código organizado por namespaces
- [x] Tests: Pruebas con PHPUnit obligatorias
- [x] Estándares: Cumplir PSR-1, PSR-2 y PSR-4
- [x] Tipado: Uso de tipado explícito en PHP
- [x] ORM: Eloquent (Laravel) u otro adecuado
- [x] RESTful: Servicios REST bajo patrón MVC
- [x] Base de Datos: MySQL o PostgreSQL

#### Evaluation Criteria
- [x] Buenas prácticas RESTful: endpoints claros, versionado, manejo de verbos HTTP, status codes correctos
- [x] Manejo de excepciones y validaciones robustas
- [x] Código mantenible, legible, extensible y documentado
- [x] Uso de estándares PSR y tipado
- [x] Tests unitarios y/o de integración
- [x] Ejemplos de filtrado, ordenamiento y paginación donde aplique
- [x] Uso responsable de dependencias externas
