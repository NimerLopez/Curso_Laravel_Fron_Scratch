[< Volver al índice](/docs/README.md)
# Actualización de clasificación y almacenamiento en caché de colecciones

## 1 Modificar la lista de noticas para que se ordenen,
Se debe hacer en el modelo all.

```php
   public static function all()
    {
       return collect(File::files(resource_path("posts")))
        ->map(fn($file)=>YamlFrontMatter::parseFile($file))
        ->map(fn($document)=> new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ))
        ->sortByDesc('date');
    }
```
La funcion sortByDesc permite ordenar una colección en función de un campo específico de forma descendente.

## 2 Vamos a guardar en cache los elementos que se entan mostrando.
```php
    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){
            return collect(File::files(resource_path("posts")))
            ->map(fn($file)=>YamlFrontMatter::parseFile($file))
            ->map(fn($document)=> new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');
        });

    }
```
El id posts.all va a ser el nombre con el que se va a guardar en cache.

## 3 crear un nuevo documento html 
con el nombre my-fith-post.

## Lista de comando en consola para el cache.
- cache()->forget('posts.all'); Eliminar el cache.
- cache('posts.all'); Ver el cache.
