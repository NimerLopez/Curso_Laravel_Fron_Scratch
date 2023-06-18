# Encuentre un paquete Composer para publicar metadatos

## 1 En la maquina virtual vamos a ejecutar el siguiente codigo.

Este comando se ejecutara en la ruta donde se encuentre el proyecto.
```cmd
    composer require spatie/yaml-front-matter
```
Este instala un paquetes para poder usarse en el proyecto.

## 2 Vamos a editar la ruta de principal.
```php
    Route::get('/', function () {
    $document=YamlFrontMatter::parseFile(
        resource_path('posts/my-first-post.html')
    );
    ddd($document);
    // $posts = Post::all();   
    // return view('posts',[
    //     'posts'=>$posts
    // ]);
});
```
Esto mostrara los datos que se encuentren en los html y tambien se puede especificar como se muestra acontinuacion.

```php
    Route::get('/', function () {
    $document=YamlFrontMatter::parseFile(
        resource_path('posts/my-first-post.html')
    );
    ddd($document->title);
    // $posts = Post::all();   
    // return view('posts',[
    //     'posts'=>$posts
    // ]);
});
```
### Se le realiza una mejora a la ruta para que funcione con un ciclo que lea los 3 archivos blog.html.
```php
    Route::get('/', function () {
    $files=File::files(resource_path("posts"));
    $document=[];
    foreach ($files as $file){
        $document[]=YamlFrontMatter::parseFile($file);
    }
    ddd($document);
    // $posts = Post::all();   
    // return view('posts',[
    //     'posts'=>$posts
    // ]);
});
```
Tendria que salir lo siguiente.

![img](img/Taller%2012/web.2.png)

## 3 vamos a agregar un constructor al modelo Post.
```php
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public fuction __construct($title, $excerpt, $date, $body){
        $this->$title=$title;
        $this->$excerpt=$excerpt;
        $this->$date=$date;
        $this->$body=$body;
    }
```
### Vamos a volver a modificar la ruta.
```php
Route::get('/', function () {
    $files=File::files(resource_path("posts"));
    $post=[];
    foreach ($files as $file){
        $document=YamlFrontMatter::parseFile($file);
        $post[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body()         
        );        
    }
    //ddd($post);
    // $posts = Post::all();   
    return view('posts',[
        'posts'=>$post
    ]);
});
```
Lo que se esta haciendo es recorrer los archivos html y pasar componente por componente al constructor creado antes(se guarda en una lista).

## 4 Vamos a agregar un nuevo metadato llamado $slug
Este se va a encargar de guardar el nombre del archivo html para poder redireccionar.

## 5 Modificar la vista posts para asi mostrar los datos del metadato.
quedaria la siguiente estructura
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
        <h1>
            <a href="/posts/<?=$post->slug;?>">
            <?=$post->title;?>
            </a>
        </h1>
        <div>
            <?=$post->excerpt;?>
        </div>
    </article>
    <?php endforeach ?>
</body>
</html>
```
Se veria de la siguiente forma

![img](img/Taller%2012/metadatos.png)

## 6 Vamos limpiar el codigo anterior de la siguiente forma 
utilizando un map que returne todos los datos sin necesidad de guardalos en una lista.
```php
Route::get('/', function () {
    $files=File::files(resource_path("posts"));
    $post=array_map(function ($file){
        $document=YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    },$files);
    //ddd($post);
    // $posts = Post::all();   
    return view('posts',[
        'posts'=>$post
    ]);
});
```
### Tambien los puedes hacer de esta forma utilizando collect.

```php
Route::get('/', function () {
    $files=File::files(resource_path("posts"));
    $post=array_map(function ($file){
        $document=YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    },$files);
    //ddd($post);
    // $posts = Post::all();   
    return view('posts',[
        'posts'=>$post
    ]);
});
```
### Pero existe una forma mas facil.
moviendo todo el codigo al modelo Post en la funcion all

```php
    public static function all()
    {
       return collect(File::files(resource_path("posts")))
        ->map(fn($file)=>YamlFrontMatter::parseFile($file))
        ->map(fn($document)=> new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));

    }
```
La ruta quedaria de la siguiente forma.
```php
Route::get('/', function () { 
    return view('posts',[
        'posts'=>Post::all()
    ]);
});
```
## 7 Borrar en el modelo Post todo loq ue este en Find
Escribir el siguiente codigo.

```php
    public static function find($slug)
    {
        $posts=static::all();
        return $posts->firstWhere('slug',$slug);
    }
```
## 8 Modificar el html del archivo post con la siguiente estructura.
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
    <article>
        <h1><?=$post->title;?></h1>
        <div>
            <?=$post->body;?>
        </div>      
    </article>
    <a href="/">Volver</a>
</body>
</html>
```
## Tendria que salir esto al final
![img](img/Taller%2012/web.final.png)