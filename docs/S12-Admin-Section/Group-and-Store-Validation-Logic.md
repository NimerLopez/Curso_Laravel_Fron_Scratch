[< Volver al índice](/docs/README.md)

# Lógica de validación de grupos y tiendas

Ya que la validacion de campos para agregar y modificar es lo mismo, ahora vamos a crear un nuevo metodo para que se haga en un solo metodo.

## 1 En el controlador AdminPostController vamos a crear un metodo para validar
```php
   protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    } 
```
- El validatePost tiene un parametro opcional llamado $post que se espera que sea una instancia de la clase Post. Si no se proporciona ningún argumento para $post, se establece en null por defecto.

- Se utiliza el operador null ??= para asignar un nuevo objeto Post a la variable $post si su valor es nulo. Esto significa que si no se proporciona un objeto Post al método, se creará uno nuevo para ser utilizado en la validación.

- Se llama a la funcion request() para obtener los datos de la solicitud actual. Esto quiere decir que el método está siendo utilizado en el contexto de una solicitud web.

- Se llama al método validate() en el objeto request() para validar los datos de la solicitud. El método validate() toma un array de reglas de validación y realiza la validación correspondiente en los datos proporcionados.


- El campo thumbnail es obligatorio si el objeto $post existe (es decir, si se está editando un post existente) y debe ser una imagen. Si el objeto $post es nuevo (es decir, si se está creando un nuevo post), entonces el campo 'thumbnail' también es obligatorio, además de tener que ser una imagen.

- El campo slug es obligatorio y debe ser único en la tabla 'posts', excepto si el objeto $post actualmente se está editando (se ignora su propia entrada de slug en la validación única).

- El método retorna el resultado de la validación, que será un array que contiene los datos validados si la validación es exitosa, o una lista de errores si la validación falla.

## 2 Modificar la funcion store y update para que funcionen mediante el nuevo metodo de validacion.

## store

```php
    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));
        return redirect('/');
    }
```

## update

```php
public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }
```