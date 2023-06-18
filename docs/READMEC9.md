# Restriccion de comodin de rutas

## 1 Escribir en la ruta el diguiente codigo
```php
    ddd($path);
```
Cuando se alcanza el punto en el código donde se encuentra ddd($path), la ejecución se detiene y se muestra la información de depuración en una página en el navegador. Esto permite verificar el valor actual de la variable $path y asegurarse de que se esté construyendo correctamente la ruta al archivo HTML del post.

Tiene que quedar de la siguiente forma.

![img](img/Taller%209/1.png)

## 2 Implementar una restricción alfanumérica para el parámetro 'post' en la ruta de Laravel

```php
Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    ddd($path);
    if (!file_exists($path)) {
        return redirect('/');
    }
    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
```
La expresión regular [A-z]+, se asegura que solo se acepten letras mayúsculas y minúsculas en el slug de la URL. Esto puede ayudar a garantizar que la ruta funcione correctamente y a evitar errores o vulnerabilidades relacionadas con caracteres no deseados en el slug.

Tambien los puedes hacer de esta forma.
```php
Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    ddd($path);
    if (!file_exists($path)) {
        return redirect('/');
    }
    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
})->whereAlpha('post');
```
Pero de esta forma deberia funcionar todo.
```php
    Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    //ddd($path);
    if (!file_exists($path)) {
        return redirect('/');
    }
    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
```
