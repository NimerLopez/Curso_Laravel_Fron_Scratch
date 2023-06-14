# Crear Rutas y link en la pagina

## 1 En el web.php vamos a cambiar el nombre de la vista
como se muestra acontinuacion.

```php
   Route::get('/', function () {
    return view('posts');
});
```
## 2 vamos a renombrar el archivo Welcome.blade.php por posts.blade.ph
Se encuentra en la carpeta public y luego views

## 3 Debes modificar el html con la siguiente estructura.
tambien debes quitar el import al app.js
### A CADA TITULO DEBES AGREGARLE UNA ETIQUETA A QUE REDIRECCIONE A LA RUTA post
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Nimer</title>
    <link rel="stylesheet" href="/app.css">
    <!-- <script src="/app.js"></script> -->
</head>
<body>
    <article>
        <h1><a href="/post"> Mi Primer Post</a></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sint iusto ipsa minus, voluptatum debitis pariatur neque labore fuga nobis itaque error reiciendis dolorum autem perspiciatis, tempora delectus id earum?</p>
    </article>
    <article>
        <h1><a href="/post">Mi Segundo Post</a></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sint iusto ipsa minus, voluptatum debitis pariatur neque labore fuga nobis itaque error reiciendis dolorum autem perspiciatis, tempora delectus id earum?</p>
    </article>
    <article>
        <h1><a href="/post">Mi Tercero Post</a></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sint iusto ipsa minus, voluptatum debitis pariatur neque labore fuga nobis itaque error reiciendis dolorum autem perspiciatis, tempora delectus id earum?</p>
    </article>
</body>
</html>
```
## 5 vamos a modificar el codifo css.
con este le vamos a cambiar el color darle unos margenes a las etiquetas y centrar los componentes. Tambien cambia el la letra.
```css
body{
    background: white;
    color: #222222;
    max-width: 600px;
    margin: auto;
    font-family: sans-serif;
}
p{
    line-height:1.6 ;
}
```
Este codigo de da margenes a los articulos y les agrega una linea para separar 2 articulos.
```css
article + article{
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid #c5c5c5;
}
```
## 6 Crear una ruta nueva llamada post
```php
Route::get('post', function () {
    return view('post');
});
```
## 7 Crear otra vista con el nombre post.blade.php
debe tener la siguiente estructura.
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Nimer</title>
    <link rel="stylesheet" href="/app.css">
    <!-- <script src="/app.js"></script> -->
</head>
<body>
    <article>
        <h1><a href="/post"> Mi Primer Post</a></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident deserunt, ducimus sit ipsam quisquam quidem deleniti tempora eveniet, soluta repudiandae laboriosam dolorem. Error impedit dolore blanditiis debitis et excepturi officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit officiis qui dicta necessitatibus! Laudantium nesciunt fugit officia quam repudiandae. Quas consequuntur facilis cum aperiam earum velit enim debitis dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sint iusto ipsa minus, voluptatum debitis pariatur neque labore fuga nobis itaque error reiciendis dolorum autem perspiciatis, tempora delectus id earum?</p>
    </article>
    <a href="/">Volver</a>
</body>
</html>
```
## 8 Revisar que todo funcione


