# Un pequeño desvío desplegable de JavaScript

## 1 Vamos a editar el Header para que el combo aparescan las categorias

```php
<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
<option value="category" disabled selected>Category</option>
    @foreach ($categories as $category)
        <option value="{{ $category->slug }}">{{ $category->name }}</option>
    @endforeach
 </select>
```

Pero seria mejor hacerlo con js por que el uso de JavaScript para generar dinámicamente opciones en un formulario de selección select puede tener ventajas dependiendo de los requisitos y la complejidad de tu aplicación
## Importar alpine 
Alpine.js se utiliza para habilitar la funcionalidad interactiva del botón y el comportamiento de mostrar/ocultar el bloque de enlaces cuando se hace clic en el botón
```html
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
```
## Se agregan estilos mediante las clase utilizando boostrap
Bootstrap es una herramienta esencial para los estudiantes de desarrollo web debido a su enfoque en el diseño responsive, su amplia colección de componentes listos para usar y su comunidad activa. Al utilizar Bootstrap, los estudiantes pueden crear interfaces modernas y receptivas de manera eficiente, ahorrando tiempo y mejorando la experiencia de usuario en diferentes dispositivos.
```php
     <button @click="show =! show" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">Categories</button>  
```

## Modificar todas las rutas para que pasen las categorias para evitar errores en el codigo
El currentCategory funciona para mostrar el nombre de la categoria que se esta bsucando.
```php
        Route::get('/', function () {
    
    return view('posts',[
        'posts'=>Post::latest()->with('category','author')->get(),
        'categories'=>Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    //$post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
});
Route::get('categories/{category:slug}', function (Category $category) {
    
    return view('posts',[
        'posts'=>$category->posts,
        'currentCategory'=> $category,
        'categories'=>Category::all()
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    
    return view('posts', [
        'posts' => $author->posts,
        'categories'=>Category::all()
    ]);
});
```
## Implementacion de un nuevo menu desplegable usando js  y alpine.
```php
                    <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                <div x-data="{ show: false }" @click.away="show = false" >
                        <button @click="show =! show"
                        class="py-2 pl-3 pr-9 text-sm font-semibold text-left w-full lg:w-32 flex lg:inline-flex">
                        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                        </button>

                        <div x-show="show" class="py-2 absolute bg-gray-100 mte-2 rounded-xl w-32 w-full z-50" style="display:none">
                        <a href="/" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">all</a>
                            @foreach ($categories as $category)
                                <a href="/categories/{{ $category->slug }}" 
                                class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                                {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}
                                ">
                                {{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>  
```

### Quedaria de la siguiente forma
![img](img/Taller%2034/web1.png)