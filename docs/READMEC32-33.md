# Componentes Blade y cuadrículas CSS

-Los componentes Blade y las cuadrículas CSS son dos conceptos diferentes utilizados en el desarrollo web.

-Blade: Blade es un motor de plantillas utilizado en el framework Laravel, que es un framework de desarrollo de aplicaciones web en PHP. Blade proporciona una sintaxis sencilla y expresiva para escribir plantillas en Laravel. Permite la separación clara entre la lógica de la aplicación y la presentación de los datos.

-En una plantilla Blade, puedes usar directivas como @if, @foreach, @extends, @section, entre otras, para controlar la lógica y la presentación de tus vistas. Blade también admite la herencia de plantillas, lo que te permite definir una plantilla base y extenderla en otras plantillas para reutilizar el código común.

## 1 vamos a modificar la vista posts .
con el siguiernte codigo se pasa por propiedades los datos posts para que se muestren en pantalla.
```php
   <x-post-feature-card :post="$post"/>
```

### agregar en la linea 1 del componente feature el siguiernet codigo 
esto hace que reciba  los datos pro propiedades o props 
```php
    @props(['post'])
```
## 2 Modifica las etiquetas con los datos que se necesitan.
![img](img/Taller%2032/1.png)


## 3 Existen funciones para dar formato a las fecha y horas como la siguiente diffForHumans
```cmd
    Published <time>{{$post->created_at->diffForHumans()}}</time>    
```

## En la vista posts vamos a crear un ciclo para mostar los post
```php
        <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$posts"/>
                @endforeach
            </div>
```
## 4 Vamos a agregar condiciones por si al base de datos no tiene contenido
```php
            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
            <x-post-feature-card :post="$posts[0]"/>

            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post)
                    <x-post-valor-x :post="$post"/>                             
                @endforeach
            </div>
            @else
                <p class="text-center">No existe contenido</p>
            @endif         
        </main>
```

## Clase grid 

Dependiendo del numero de columnas que escribas va a ser el tamaño del grid por ejemplo un grid de 3 columnas o 4
```html
    <div class="lg:grid lg:grid-cols-2">
```

### Quedaria de la siguiente forma
![img](img/Taller%2032/web1.png)

<br>

# Convertir la página de publicación de blog

## 1 Copiar el codigo htm y pegarlo en la vista post.
Se debe quitar el nav y el footer, por que estos ya fueron agregados.

## 2 Crear un componente llamado category button
Este va a tener el boton de categorias para asi poderlo usar en cualquier lado y no repetir codigo.
```html
    <div class="lg:grid lg:grid-cols-2">
```
## 3 Cambia todos los datos quemados por los de la base de datos
