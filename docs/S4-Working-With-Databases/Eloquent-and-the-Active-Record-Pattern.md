[< Volver al índice](/docs/README.md)
# Migraciones: los fundamentos absolutos

## Vamos a dejar todo como estaba Control+z
al dejar todo como estaba ejecutamos el siguiente comando.
```cmd
    php artisan migrate:rollback
    php artisan migrate:fresh
```
##  2  vamos a ejecutar los siguientes comando.
crea una nueva instancia del modelo User. Este comando se utiliza para instanciar un objeto del modelo User, lo cual te permite interactuar con los datos de la tabla users de la base de datos.

![img](img/Taller%2019/1.png)
```php
    php artisan tinker
    $user=new App\Models\User
    $user=new User;
```
## vamos a crear un nuevo usuario.
```php
    $user->name='nimer';
    $user->email='nimer@gmail.com';
    $user->password=bcrypt('!password');
    $user->save();
    $user
```
El comando $user se utiliza para ver el dato y el user save para guardar la informacion en la base de datos.

### tambien podemos usar este comando para hacer busquedas.
los trae por id.
```php
    User::find(10);
```
Trae todos los usuarios.
```php
User::all();
```
si creas otro usuario lo puedes verificar.

### Con este comando puede traer por nombres o atributos.
```php
$user->pluck('name');
```