# Clockwork, y el problema N+1

## 1 vamos a modificar la ruta principal.
\Illuminate\Support\Facades\DB::listen(function ($query) { }): Esta línea configura un escucha de consultas de la base de datos utilizando la clase DB de Laravel
```php   
   Route::get('/', function () {
    \Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });
    return view('posts',[
        'posts'=>Post::all()
    ]);
});
```

## 2 Instala la siguiente libreria de composer
```php
    composer require itsgoingd/clockwork
```
## 3 En Google Chrome instala la siguiernte extencion

[Clockwork](https://chrome.google.com/webstore/detail/clockwork/dmggabnehkmmfmdffgajcflpdjlnoemp/related)

## 4 Inspecciona a ver cuanto trafico existe en pagina.
tendria que salirte lo siguiente.
![img](img/Taller%2026/web.png)