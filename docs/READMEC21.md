# Actualizaciones elocuentes y escape de HTML

## 1 Los textos de body son planos, vamosa  comvertilos a etiquetas.

### 1.1 Vamos a buscar el primer post
se realiza desde la consola
```php
    $post=App\Models\Post::first();
```
### 1.2 Con este coamndo convertimos a una etiqueta.
```php
    $post->body = '<p>' . $post->body . '</p>'
     $post->save()
```
### 1.3 debes repetir lo mismo codigos para el 2 post
No ejecutes que busque el primero si no el 2 y vas cambiando el id si son mas.
```php
    $post=App\Models\Post::find(2);
```
##  2  Vamos a modificar los titulos cone ls iguiente codigo.
El valor asignado incluye etiquetas HTML <strong> para resaltar el texto "Primer" en negrita
```php
    $post=App\Models\Post::first();
    $post->title= 'Mi <strong>Primer</strong> Post'
```
### Tambien pude tener una alerta.
```php
    $post=App\Models\Post::first();
     $post->title= 'Mi Post<script>alert("hola")</script>'
```
