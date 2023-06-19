# Diseños de hoja de dos maneras

## 1 vamos a importar un css de una libreria en las 2 views
Pero al tener lo que hacer en las 2 paginas es mejor crear un archivo que contenga ese diseño.
```php
    <link rel="stylesheet" href="/vendor-lib.css">
```
## 2 vamos a crear una nueva vista con la siguiente estructura.
```php
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Nimer</title>
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/vendor-lib.css">
    <!-- <script src="/app.js"></script> -->
</head>
<body>
    @yield('content')
</body>
</html>
```

## 3 vamos a cortar todo lo que este en la vista posts.
se debe agregar el siguiente codigo.
```php
    @extends ('loyout')
    @section('content')
        Pegar lo que se borro
    @endsection
```
### dentro del secction se debe pegar lo que se corto
lo que se esta haciendo es que el loyout esta aplicando el codigo css a todas las views que esten dentro del section.

## 3 en la vista loyout creamos otra seccion banner
```php
<body>
     <header>
        @yield('banner')
    </header>
    @yield('content')
</body>
```
gracias a esto podemos tener una seccion con un banner en todas nuestras vistas sin repetir codigo.

## 4 vamos a aplicar lo mismo a la vista post.
tiene que quedar de la siguiente manera.
![img](img/Taller%2015/2.png)

## 5 crea una carpeta llamada components y mueve el layout
en la vistas
 
### 6 Modifica el layout con el siguiente codigo
```php
<body>
    {{$slot}}
</body>
```
## 7 modificar la vista posts con la siguiente estructura.

```php
<x-layout>
@foreach ($posts as $post)
<article class="{{ $loop->even ? 'foobar' : '' }}">
    <h1>
        <a href="/posts/{{ $post->slug }}">
            {{ $post->title }}
        </a>
    </h1>
    <div>
        {{ $post->excerpt }}
    </div>
</article>
@endforeach
</x-layout>
```
Este código utiliza el componente layout como el contenedor principal de la página y muestra una lista de artículos ($posts) dentro de él. Cada artículo tiene un título y un extracto, y se aplica una clase CSS "foobar" a los artículos impares.

