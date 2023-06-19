# Migraciones: los fundamentos absolutos

## En la terminal nos conectamos a la base datos
```cmd
    sudo mysql
```
##  2  vamos a la ruta de nuestro proyecto y ejecuta el siguiente coamndo
se utiliza revertir una migracion.
```cmd
    php artisan migrate:rollback
```
### Le podemos hacer cambios a la tablas desde el archivo migrations y simplemente hacer rollback y volver a hacer la migracasion.
![img](img/Taller%2018/1.png)
```cmd
    php artisan migrate
```

## 3 Volvemos a ingresar a la consola y ejecuta los siguientes comandos

es útil cuando deseas eliminar todas las tablas existentes en tu base de datos y comenzar de nuevo con las migraciones

si existe datos en la base de datos y ejecutas este codigo, pierdes todo.
```cmd
    php artisan migrate:fresh
```
## 3 Al arquivo que hace la migracion se modifica por lo siguiente.
```php
   public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }
```
## Luego en consola ejecuta los siguiente comandos
```cmd
    php artisan migrate:rollback
    php artisan migrate:fresh
```

