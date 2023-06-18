# Usar la clase del sistema de archivos para leer un directorio

## 1 vamos a comentar temporalmente la ruta del posts/{post}
```php
    Route::get('posts/{post}', function ($slug) {
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";
    // if (!file_exists($path)) {
    //     return redirect('/');
    // }
    // $post = cache()->remember("posts.{$slug}", 5,function() use ($path){
    //     var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });
    
    // return view('post', [
    //     'post' => $post
    // ]);
})->where('post', '[A-z_\-]+');
```
## 2 Implementa el siguiente codigo.
```php
Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', ['post' => $post]);

    // Código anteriormente comentado
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";
    // if (!file_exists($path)) {
    //     return redirect('/');
    // }
    // $post = cache()->remember("posts.{$slug}", 5, function() use ($path) {
    //     var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });
    // return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+');
```
En esta nueva implementación, se utiliza el modelo Post para obtener el contenido relacionado con el slug proporcionado. El método find($slug) busca el archivo con el nombre correspondiente.

## 3 vamos a crear el modelo Post.
Los modelos se encuentran en la carpeta app/models.
Debmos crear una clase llamada Post.php con la siguiente estructura
```php
    <?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        
    }
}
```
## 4 Mover todo el codigo comentado a la clase Post
Dentro de find.

tiene que quedar de la siguiente forma.

```php
<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        base_path();
        //$path = __DIR__ . "/../resources/posts/{$slug}.html";
        if (!file_exists($path=resource_path("posts/{$slug}.html"))) {
            //return redirect('/');
            throw new ModelNotFoundException();
         }
        return cache()->remember("posts.{$slug}", 5, function() use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
        });       
    }
}
```
ahora existe un modelo que se encarga de returnar el blogs que se necesite y ahora el archivo web esta mas limpio.

## 5 Limpar codigo de toda la lista de posts
se va a realizar mediante un foreach
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Nimer</title>
    <link rel="stylesheet" href="/app.css">
    <!-- <script src="/app.js"></script> -->
</head>
<body>
    <?php foreach ($posts as $post) : ?>
    <article>
        <?= $post; ?>
    </article>
    <?php endforeach ?>
</body>
</html>
```
## 6 vamos a modificar la ruta  / para que pase por propiedades o los componentes que ocupa la vista
```php
    Route::get('/', function () {
    $posts = Post::all();
    return view('posts',[
        'posts'=>$posts
    ]);
});
```
## 7 En el modelo Post vamos a crear otro metodo que traiga a todos los blogs.
```php
        public static function all()
    {
        return File::files(resource_path("posts/"));
    }
```
### Si todo va bien tendria que salirte lo siguiente.

![img](img/Taller%2011/web2.png)

## 6 Vamos a modificar otra vez el modelo Post
Ahora vamos a recorrer cada archivo mediante un map para asi poder hacer un return de cada elemento de todos los html.
```php
       public static function all()
    {
        $files=File::files(resource_path("posts/"));
      return  array_map(function ($files){
            return $files->getContents();
        },$files);

    }
```
