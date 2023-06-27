[< Volver al índice](/docs/README.md)
# Buscar (la forma desordenada)

## Que hace un formulario

un formulario es una manera de recopilar y enviar datos desde una página web al servidor. Los campos de entrada permiten a los usuarios ingresar información, y el atributo "action" especifica la URL de destino para enviar los datos. El atributo "method" define cómo se envían los datos al servidor.

## Pasos para el buscador:

### 1 vamos a modificar la ruta principal.

```php
   Route::get('/', function () {
    $posts=Post::latest();
    if (request('search')) {
        $posts
        ->where('title','like','%' . request('search') . '%')
        ->orWhere('body','like','%' . request('search') . '%');
    }
    return view('posts',[
        'posts'=>$posts->get(),
        'categories'=>Category::all()
    ]);
})->name('home');
```
Este código realiza una consulta para obtener los posts más recientes. Si se proporciona un parámetro de búsqueda en la solicitud GET, se agregan condiciones a la consulta para filtrar los posts por título o cuerpo que coincidan con el valor de búsqueda. Luego, se pasa el resultado de la consulta y todos los registros de categorías a la vista "posts" para su visualización.

- where('title','like','%' . request('search') . '%'): Si hay un parámetro "search", se agrega una condición a la consulta $posts para filtrar los posts cuyo título contenga el valor de búsqueda. La cláusula LIKE con los caracteres de porcentaje (%) busca coincidencias parciales en el título.

- orWhere('body','like','%' . request('search') . '%'): Además de la condición anterior, se agrega otra condición con orWhere() para filtrar los posts cuyo cuerpo contenga el valor de búsqueda. Esto significa que si el valor de búsqueda coincide con el título o el cuerpo de un post, se seleccionará.

## 2 Modifica el formulario para que guarde en el input el valor de busqueda
```php
    <form method="GET" action="#">
        <input type="text" 
        name="search" 
        placeholder="Find something"
        class="bg-transparent placeholder-black font-semibold text-sm"
        value="{{request('search')}}">
    </form>
```
<br>
<br>

---

# Búsqueda (la forma más limpia)

## 1 Vamos a crear un controlador llamdo PostsController
un controlador es una pieza de código en una aplicación web que se encarga de manejar las solicitudes del usuario, procesar los datos, interactuar con la base de datos u otros servicios, y devolver una respuesta. Ayuda a mantener el código organizado y facilita la reutilización del código.
```php
   class PostsController extends Controller
{
    public function index()
    {
        //dd(request(['search']));
        return view('posts',[
            'posts'=>Post::latest()->filter(request(['search']))->get(),
            'categories'=>Category::all()
        ]);
    }
}    
```

## 2 en el controlador Post crear una funcion que haga la busqueda
```php
    
    public function getPosts()
    {
        Post::latest()->filter()->get()
        // $posts=Post::latest();
        // if (request('search')) {
        //     $posts
        //     ->where('title','like','%' . request('search') . '%')
        //     ->orWhere('body','like','%' . request('search') . '%');
        // }
        return $posts->get();
    }   
```

## 3 Crear un nuevo metodo en el modelo Posts y borrar la funcion getPosts
Un modelo en el desarrollo de aplicaciones es como un plano que define la estructura y las reglas de interacción con los datos en la base de datos. Proporciona una forma fácil y conveniente de crear, leer, actualizar y eliminar datos, y puede incluir validaciones para garantizar la integridad de los datos. El modelo actúa como una capa de abstracción entre el código de la aplicación y la base de datos.

```php
    public function scopeFilter($query, array $filters)
    {
       $query->when($filters['search'] ?? false, fn($query, $search)=>
       $query
       ->where('title','like','%' . $search . '%')
       ->orWhere('body','like','%' . $search . '%'));     
    }
```
## Las rutas quedarian de la siguiernte forma
```php
Route::get('/',[PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}',[PostsController::class, 'show']);
```
### Quedaria de la siguiente forma
![img](img/Taller%2037-38/web1.png)