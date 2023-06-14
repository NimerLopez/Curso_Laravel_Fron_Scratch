# Manejo de rutas en laravel

En las carpetas rutas, se encuentra un archivo llamado web.php el cual se encarga llamar las vistas que se encuentran en la carpeta resources y luego en views en esta se encontraran todas las vistas que se desean mostrar.

## ¿Que pasa si borro o comento las rutas o escribo mal el nombre de una vista?
<span style="color:red">si borras esa ruta no mostrará nada al ingresar a la página.</span> 

Archivo web.php
```php
//Route::get('/', function () {
//    return 'bienvenido';
//});
```
en el caso anterior dara un error la pagina, <span style="color:red">el mismo caso seria si escribes mal el nombre de una vista.</span> 


Archivo web.php
```php
Route::get('/', function () {
    return 'bienvenido';
});
```

## Para mostrar un mensaje en la pagina lo puedes hacer de la siguiente manera

Archivo web.php
```php
Route::get('/', function () {
    return view('No existo');
});
```
## Crear una ruta
```php
Route::get('/home', function () {
    return view('welcome');
});
```
En este caso si voy a http://lfts.isw811.xyz/ me saldra un error ya que ahora la ruta es http://lfts.isw811.xyz/home







