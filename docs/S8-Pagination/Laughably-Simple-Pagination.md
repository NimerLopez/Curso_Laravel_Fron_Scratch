[< Volver al índice](/docs/README.md)

# Paginación ridículamente simple

## 1 modificar el  postsController para que no returne todos los datos si no por pagina.
```php
        public function index()
    {
        //dd(request(['search']));
        return view('posts.index',[
            'posts'=>Post::latest()->filter(request(['search', 'category','author']))->paginate(6)->withQueryString()       
        ]);
    }
```
- El método paginate() es utilizado en Laravel para realizar la paginación de resultados. En este caso, se establece un valor de 6 como argumento, lo que significa que se mostrarán 6 elementos por página en la vista

- El método withQueryString() es utilizado junto con el método paginate() para asegurarse de que los parámetros de consulta actuales se mantengan en los enlaces de paginación generados

- En vez de pagite puedes usar simplePaginator

## 2 Agregar en la vista index el siguiente codigo
Esto va a ser que se muestre un carrusel con las paginas disponibles.
```php
    {{$posts->links()}}
```
## 3 Ejecuta el siguiernte comando en la raiz del proyecto
```cmd
    php artisan vendor:publish
```
Le das a la opcion 17

## 4 Agregar este codigo en el archivo AppServiceProvider
Esto le dara un diseño de bootstrap el pero no se recomienda usarlo
```php
        public function boot()
    {
       Paginator::useBootstrap();
    }
```
### Quedaria de la siguiente forma
![img](img/web1.png)