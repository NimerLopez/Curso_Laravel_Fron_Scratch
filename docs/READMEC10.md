# Usar el almacenamiento en caché para una operación costosa

## Implementa este codigo en la ruta post
```php
    $post = cache()->remember("posts.{$slug}", 5,function() use ($path){
        var_dump('file_get_contents');
        return file_get_contents($path);
    });
```
### Tiene que quedarte de la siguiente manera.
```php
   Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if (!file_exists($path)) {
        return redirect('/');
    }
    $post = cache()->remember("posts.{$slug}", 5,function() use ($path){
        var_dump('file_get_contents');
        return file_get_contents($path);
    });
    
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
```
## 1 Utiliza la función cache() para acceder a la instancia del caché en Laravel.
</br>

## 2 Utiliza el método remember() para almacenar en caché el resultado de una operación durante un tiempo especificado.

    -La clave de caché utilizada es "posts.{$slug}", que combina el prefijo "posts." con el valor de $slug. Esto crea una clave única para cada post.
    -El tiempo de caché se establece en 5 minutos(puede cambiar, solo hay que sacar cuentas).
    -Dentro de la función anónima (function () use ($path) { ... }), se ejecuta el código que se almacenará en caché.
</br>

## 3 Dentro del callback de caché, se utiliza var_dump('file_get_contents') para imprimir una cadena de depuración que indica que se está utilizando la función file_get_contents.
</br>

## 4 Se utiliza file_get_contents($path) para obtener el contenido del archivo en la ruta $path.
</br>

## 5 El contenido obtenido se almacena en caché con la clave "posts.{$slug}" y se asigna a la variable $post.
