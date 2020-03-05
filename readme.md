Desafío Test:
- Debes crear una app en React + Laravel + MySql (como te comente, puedes usar la que prefieras) en la cual se pueda registrar y logear usuario (sin recuperación de contraseña) y en la que existan dos perfiles de usuario: Administrador y Usuario.
- El perfil administrador solo tiene una tabla para gestionar tickets (Crud) en donde se los puede asignar a usuarios.
- El perfil de usuario solo posee una lista de tickets asignados a el y un boton para pedirlos (setear el ticket_pedido).
- El login de usuarios debe discriminar y redireccionar según su perfil.
- Debes subir el proyecto a git y enviarnos las instrucciones para levantar el proyecto (incluye el script de SQL en el proyecto).
- El proyecto cuenta con 3 Tablas:
1. usuarios: id, id_tipouser, nombre, mail, pass
2. ticket: id , id_user , ticket_pedido
3. tipo_usuario: id, nombre

Instrucciones:
1. Clonar el proyecto: "git clone https://github.com/EdgarPezoa/KeironTest.git"
2. Crear archivo .env indicando la base de datos luego ejecutar el comando "php artisan config:cache"
3. Ejecutar comando de consola "composer install" y "composer update"
4. Restaurar base de datos o correr migraciones "php artisan migrate --seed"

Contenido:
- Custom middleware para cada tipo de usuario
- Rutas robustas
- Migraciones con seeders
- CRUD de tickets
- Flash message
- Modelos
- Laravel collective
