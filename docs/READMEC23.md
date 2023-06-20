# Enlace de modelo de ruta

## 1 Vamos a modificar 2 ruta tiene que quedar de la siguiente forma.
La función de callback recibe un parámetro $post de tipo Post. Laravel utiliza la inyección de dependencias para resolver automáticamente esta dependencia, lo que significa que Laravel buscará un modelo Post que coincida con el valor capturado en la URL y lo pasará a la función.
```php
    Route::get('posts/{post}', function (Post $post) {
    return view('post', ['post' => $post]);
});
```

##  2 Vamos a modificar el archivo que realiza la migracion.
En este caso del Post, agrega slug unico
```php
       public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('excerpt');
            $table->string('body');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }
```
### Ejecuta el siguiente comando para que los cambios se vean reflejados.
```cmd
    php artisan migrate:fresh
```

## 3 Vuelve a registrar Usuarios con la nueva estructura

### 4 modifica la ruta para que ahora sea por slug
```php
Route::get('posts/{post:slug}', function (Post $post) {
    //$post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
});
```
### El link de la vista post tambien debe ser modificado por slug
```php
<a href="/posts/{{ $post->slug }}">
```

### Puedes implementar este codigo para que en vez de que se returne el id sea el slug en el modelo.
```php
     public function getRouteKeyName()
     {
         return 'slug';
     }
```
Este metodo es es recomendado, asi que puedes seguir usando el qeu se mostro al inicio.