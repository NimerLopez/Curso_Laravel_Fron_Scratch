# Convierta HTML y CSS a Blade

## 1 Descarga este archivo 
[Laravel From Scratch: HTML & CSS](https://github.com/laracasts/Laravel-From-Scratch-HTML-CSS)


##  2 copiar la carpeta de imagenes y moverla a la carpeta public

## 3 copiar en codigo del index.html headers y footer y pegarlo en el layout.blade.php

![img](img/Taller%2031/2.png)

## 4 Corregir la ruta de las imagenes


## 5 pega el main en la vista posts y borra todas las columnas que se encuentren en la clase lg:grid lg:grid-cols-3
agrega este codigo para que cargue sus componentes
```php
    <x-post-card/>
```
Debe quedar de la siguiente forma.

![img](img/Taller%2031/3.png)
## 6 Modifica el codigo Main de la vista post que quede como se muestra acontinuacion.
```php
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            
            <x-post-card/>
            
            <div class="lg:grid lg:grid-cols-2">
                <x-post-card/>
                <x-post-card/>
            </div>

            <div class="lg:grid lg:grid-cols-3">               
                <x-post-card/>
                <x-post-card/>
                <x-post-card/>
            </div>
        </main>
```

## Crea una nueva vista llamada _posts-header y guarda el header 
lo puedes implementar al home con el siguiernet codigo
```php
    @include('_posts-header')
```
## 
```php
```

### Quedaria de la siguiente forma
![img](img/Taller%2031/web.png)