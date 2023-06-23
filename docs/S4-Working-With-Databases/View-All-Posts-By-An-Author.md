[< Volver al índice](/docs/README.md)
# Ver todos los mensajes de un autor

## 1 vamos a modificar la ruta principal.
El método latest() se utiliza para ordenar los resultados de una consulta por la columna de fecha de creación (created_at) en orden descendente, es decir, los registros más recientes aparecerán primero.
```php
   Route::get('/', function () {
    
    return view('posts',[
        'posts'=>Post::latest()->with('category')->get()
    ]);
});
```

## 2 mofificar esta lienea en vez de user author
```php
    <p>
          By <a href="#">{{$post->author->name}}</a> in   <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
```
### tambien debes cambiar el nombre de la funcion user a author en el modelo

```php
        public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }      
```

## 3 Vamos a crear una nueva ruta 
Esta sera la busqueda de Post por autores.
```php
Route::get('authors/{author}', function (User $author) {
    dd($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});

```
## 4 Vamos a modificar las vistas que tengan el nombre del autor para que los lleve a sus posts
```php
    By <a href="authors/{{$post->author->username}}">{{$post->author->name}}</a> in   <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
```
## 5 Vamos a agregar un nuevo componente al usuario
```php
        public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
```
### Tambien hay que cambiar el factory
```php
       public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username'=> $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
```
## Modificar la ruta para que se por username
```php
    Route::get('authors/{author:username}', function (User $author) {
    
    return view('posts', [
        'posts' => $author->posts
    ]);
});
```

### Quedaria de la siguiente forma
![img](img/Taller%2029/web.png)