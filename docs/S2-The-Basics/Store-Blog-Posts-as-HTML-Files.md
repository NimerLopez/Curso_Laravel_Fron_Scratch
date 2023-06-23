[< Volver al índice](/docs/README.md)
# Almacenar publicaciones de blog como archivos html

## 1 vamos a a modificar el archivo post 
Este se encuentra en la carpeta resources y luego en view.

Debes escribir el siguiente codigo.

```php
    <article>
        <?=$post;?>
    </article>
```
este código muestra el contenido de la variable $post dentro de un elemento article

## 2 Para que no de error debes pasar en la ruta esa variable post
la ruta se encuentra en routes y luego en web.

debes modificar la ruta con el siguiente codigo

```php
Route::get('post', function () {
    return view('post',['post'=>'<h1>Binevendo</h1>']);
});
```
La etiqueta h1 es la que se mostrara.

## 3 En la carpeta resources vamos a crear una capeta llamada posts
dentro de esta carpeta se van a crear 3 archivos html los cuales tendran una etiqueta a con textos
```html
    <a>
        lorem 
    </a>
```
en estos 3 archivos se van a guardar los datos de los posts
## 4 vamos a volver a editar la ruta post con el siguiente codigo.

```php
    Route::get('post', function () {
    $post = file_get_contents(__DIR__ . '/../resources/posts/my-first-post.html');
    
    return view('post', [
        'post' => $post
    ]);
});
```
este codigo lo que hace es buscar el archivo html que se creo antes y pasar la variable post para que se muestre en la pagina.
### vamos a mejorar el codigo anterior con validacion de errores.

```php
    Route::get('posts/{post}', function ($slug) {
    $path=__DIR__ . "/../resources/posts/{$slug}.html";
    
    if (! file_exists($path)){
        return redirect('/');
    }
    $post=file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
});
```
en la variable slug se guarda la ruta o el nombre del archivo html que se va a mostrar. el if valida que la ruta existe y si no lo redirecciona al inicio 

## 5 vamos a modificar la vista posts.
en este caso simplementa seran las rutas de los detalles de los blogs.
```html
    <h1><a href="/posts/my-first-post"> Mi Primer Post</a></h1>
    <h1><a href="/posts/my-second-post">Mi Segundo Post</a></h1>
    <h1><a href="/posts/my-third-post">Mi Tercero Post</a></h1>
```

