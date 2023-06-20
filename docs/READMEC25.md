# Mostrar todas las publicaciones asociadas con una categoría

## 1 vamos a crear una nueva ruta para las categorias.
```php
    Route::get('category/{category:slug}', function (Category $category) {
    
    return view('posts',[
        'posts'=>$category->posts
    ]);
});
```

## 2 Vamos a implentar un codigo al modelo de Category 
Este lo que hace es vincular una categoria con un Post
```php
      class Category extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
```
## 3 Vamos a ralizar unas pruebas para ver si funciona
se debe hacer en consola
```php
     App\Models\Category::first();
     App\Models\Category::first()->posts;   
```

## 4 Modifica la etiqueta a del las categorias con el siguiente codigo
```cmd
       <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
```

## 
```php

```
### 
```php
```

## 
```php
    
```
## 
```php
```

### Quedaria de la siguiente forma
![img](img/Taller%2025/)