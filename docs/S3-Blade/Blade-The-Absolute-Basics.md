[< Volver al índice](/docs/README.md)
# Blade el básico absoluto

## Que Hace blade.
blade lo que hace es interpretar el lenguaje de etiquetas html si una vista no tiene la extension blade, no se vera su estructura.

### 1 Podemos utilizar este codigo para mostrar datos sin necesidad de <?=>
```php
    {{$post->title}}
```

Tendria que quedar de la siguiente forma.
![img](img/Taller%2014/1.png)

El ciclo tambien se puede hacer de otra forma.
```php
@foreach ($posts as $post) 
    <article>
        <h1>
            <a href="/posts/{{$post->slug}}">           
            {{$post->title}}
            </a>
        </h1>
        <div>
        {{$post->excerpt}}
        </div>
    </article>
    @endforeach 
```
## 2 tambien podemos agregar un dd($loop) 
muestra información sobre la variable $loop, que es una variable especial proporcionada por Blade en los bucles @foreach. Esta variable contiene información sobre la iteración actual

la clase que se agrego al article verifica si la iteración actual en un bucle @foreach es par y, en caso afirmativo, devuelve la cadena 'foobar'
```php
@foreach ($posts as $post) 
     @dd($loop)
    <article class="{{$loop->even ? 'foobar':''}}">
        <h1>
            <a href="/posts/{{$post->slug}}">           
            {{$post->title}}
            </a>
        </h1>
        <div>
        {{$post->excerpt}}
        </div>
    </article>
    @endforeach 
```

