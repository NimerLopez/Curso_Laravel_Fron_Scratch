[< Volver al índice](/docs/README.md)

# Escribir el marcado para un comentario de publicación

escribir el marcado adecuado para un comentario de publicación es importante porque mejora la accesibilidad, la legibilidad y la mantenibilidad de tu sitio web. Además, proporciona una estructura clara y significativa que ayuda a los usuarios.

## 1 En la vista show implementa el siguiernte codigo
```php
    <section class="col-span-8 col-start-5 mt-10 space-y-6">
        <x-post-comment/>
    </section>
```


## 2 Creamos un nuevo componente con el siguiernte codigo

```php
    <article class="flex bg-gray-100 border border-gray-200 px-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img class="rounded-xl" src="https://i.pravatar.cc/60" width="60" height="60" style="max-width: 100px;" alt="auto">                          
        </div>
    <div>
    <header class="mb-4">
            <h3 class="font-bold">Nimer Lopez</h3>

            <p class="text-xs">Publicado el  <time>8 months ago</time> </p>                              
    </header>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ea eos debitis. Alias temporibus quidem similique facere, doloribus dolorem nihil ducimus at est, quo non totam sapiente magni quam architecto?
        </p>
    </div>
</article>
```
Unas ves echo esto tendras en la parte inferior un comentario del autor junto a la fecha

# Un poco de limpieza del capítulo ligero

## 1 Vamos a mover todo el diseño del form de comentarios a otro componente 
![img](img/c1.orden.png)

En la vista show debes llamarlo de la siguiernte manera.
```php
    @include ('posts._add-comment-form')
```
## 2 crea otro componente para el boton de submit
![img](img/c2.orden.submit.png)

Lo debes llamar de la siguiente forma.
```php
     <x-submit-button>Submit</x-submit-button>
```
Esto ayuda a que el codigo este estructurado y limpio, gracias a esto sera mas facil dar mantenimiento al software y que los demas desarrolladores lo entiendan.

### Quedaria de la siguiente forma
![img](img/web1.png)