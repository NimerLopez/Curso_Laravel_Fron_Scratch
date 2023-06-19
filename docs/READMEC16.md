# Algunos ajustes y consideración

## 1 Borrar esta parte de la 2 ruta
el archivo llamado web 
```php
->where('post', '[A-z_\-]+')
```
##  2 en el Modelo crear otra ruta que valide la existencia de un archivo.
```php
    public static function findOrFail($slug)
    {
        $posts=static::find($slug);
        if (!$posts) {
            throw new ModelNotFoundException();
        }
        return $posts;
    }
```
Este codigo lo que hace es evitar que se caiga la aplicacion cuando alguien digite un documento que no existe.

## 3 Se modifica la ruta para implementar esta funcion.
```php
Route::get('posts/{post}', function ($slug) {
    $post = Post::findOrFail($slug);
    return view('post', ['post' => $post]);
});
```
### Si todo funciona al digitar mal una pagina deberia salir lo siguiente.

![img](img/Taller%2016/web.error.png)

### Pero si todo esta bien deberia salir lo siguiente.

![img](img/Taller%2016/web.png)