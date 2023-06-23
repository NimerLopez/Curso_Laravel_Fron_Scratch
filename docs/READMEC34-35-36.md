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

<br>

# Cómo extraer un componente de hoja desplegable

## Pasos para extraer un componente de hoja desplegable

1. **Crear un nuevo archivo**: Crea un nuevo archivo con un nombre descriptivo para tu componente de hoja desplegable, por ejemplo, `dropdown.blade.php`.

2. **Copiar el contenido del componente**: Copia el contenido completo de tu componente de hoja desplegable y pégalo en el nuevo archivo `dropdown.blade.php`.

3. **Eliminar dependencias externas**: Asegúrate de eliminar cualquier dependencia externa que pueda estar presente en tu componente, como variables de PHP específicas del contexto. Esto hará que el componente sea más independiente y reutilizable.

4. **Ajustar las directivas de Blade**: Si tu componente utiliza directivas Blade, como `@foreach` o `@if`, asegúrate de que las variables utilizadas en esas directivas estén disponibles en el contexto donde se utiliza el componente. Puedes pasar las variables necesarias al componente como propiedades.

5. **Utilizar el componente en otras partes de la aplicación**: Ahora que tienes el componente de hoja desplegable en su propio archivo, puedes utilizarlo en otras partes de tu aplicación. Para hacerlo, importa el componente usando la directiva `x-dropdown` y pasa cualquier información necesaria a través de propiedades.

Este código es un componente de dropdown. Un dropdown es como un menú desplegable que se muestra cuando hacemos clic en un botón o enlace. El código está escrito en lenguaje HTML y utiliza algunas características especiales proporcionadas por la biblioteca JavaScript llamada Alpine.js.

```php
   @props(['trigger'])
<div x-data="{ show: false }" @click.away="show = false" >
    {{-- Trigger --}}
    <div @click="show= ! show">
        {{$trigger}}
    </div>


<div x-show="show" class="py-2 absolute bg-gray-100 mte-2 rounded-xl w-32 w-full z-50" style="display:none">
    {{$slot}}                      
</div>
```
Cuando la propiedad show es true, se muestra este bloque de código utilizando x-show. Aquí, {{$slot}} muestra el contenido que se pasa al componente entre las etiquetas de apertura y cierre. Es como una ranura o espacio reservado donde podemos insertar cualquier contenido dentro del menú desplegable.

El "trigger" o activador del menú desplegable. Es el elemento en el que hacemos clic para mostrar u ocultar el menú desplegable. Cuando hacemos clic en este elemento, se activa la función @click, que invierte el valor de la propiedad show. Aquí, {{$trigger}} muestra el contenido de la propiedad trigger que pasamos al componente.

## vamos hacer el mismo proceso con los item 
-crear un componente `x-dropdown-item`
-Pasar el codigo al componente en este caso:

```php
@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';
    if ($active) {
        $classes .= ' bg-blue-500 text-white';
    }
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
```

# Ajustes rápidos y limpieza

## 1 cambiar clase de este div
esto evitara que la lista de categorias no se haga tan grande y que mejor haga scroll
``` php
<div x-show="show" class="py-2 absolute bg-gray-100 mte-2 rounded-xl w-32 w-full z-50 overflow-auto max-h-52" style="display:none">
```
## 2 borrar la texto del inicio en el componente post headers

## 3 comenatra estas lineas de codigo
```php
                <!-- <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                        <option value="category" disabled selected>Other Filters
                        </option>
                        <option value="foo">Foo
                        </option>
                        <option value="bar">Bar
                        </option>
                    </select>

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </div> -->
 ```
 ## 4 modificar el factory del post con el siguiernet codigo
 ```php
     public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'title'=>$this->faker->sentence,
            'slug'=>$this->faker->slug,
            'excerpt'=>'<p>'. implode('</p><p>', $this->faker->paragraphs(2)) . '<P>',
            'body'=>=>'<p>'. implode('</p><p>', $this->faker->paragraphs(10)) . '<P>'
        ];
    }               
 ```