[< Volver al índice](/docs/README.md)
# Relaciones de carga ansiosa en un modelo existente

## 1 vamos a crear 10 nuevos post.

```php
   App\Models\Post::factory(10)->create(['category_id'=>1]);
```

## 2 Modifica las siguiernet rutas para arreglar problema de carga
```php
    Route::get('categories/{category:slug}', function (Category $category) {
    
    return view('posts',[
        'posts'=>$category->posts->load(['category','author'])
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    
    return view('posts', [
        'posts' => $author->posts->load(['category','author'])
    ]);
});
```
El método load(['category', 'author']) se utiliza para cargar de forma ansiosa las relaciones category y author de los posts del autor. Esto significa que se obtendrán los datos de las categorías y los autores relacionados sin necesidad de realizar consultas adicionales a la base de datos

## 3 Evite el codigo del metodo 2 escribiendo este pequeño codigo en el modelo post
Esto evitara que ruta tenga mucho codigo en las rutas.
```php
         protected $with=['category','author'];  
```

### Quedaria de la siguiente forma
![img](img/Taller%2030/web.modi.png)