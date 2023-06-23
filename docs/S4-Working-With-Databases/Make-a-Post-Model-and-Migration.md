[< Volver al índice](/docs/README.md)
# Hacer un modelo de publicación y migración

## 1 Vamos a borrar el modelo post y la carpeta posts
se borra por que ahora se trabajara mediante la base de datos.

##  2  vamos a ejecutar los siguientes comando.
Este comando crea un archivo de migracios para poder implementar una tabla mas al realizar una migracion.
<!-- ![img](img/Taller%2019/1.png) -->
```php
     php artisan make:migration create_posts_table
```
## 3 vamos modificar el archivo creado agregando el siguiente codigo.
```php
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('excerpt');
            $table->string('body');
            $table->timestamps();
        });
    }
```
### vamos a migrar esa nueva tabla
```php
     php artisan migrate
```
## 3 Crear el nuevo modelo Post
con el siguiente comando
```php
   php artisan make:model Post
```
## 4 crear un nuevos posts
```php
$post=new App\Models\Post;
$post->title='Mi Primer Post'
$post->excerpt='Lorem ipsum dolor sit amet consectetur adipisicing'
$post->body='Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis sequi ipsam quibusdam est velit! Obcaecati cupiditate numquam rerum placeat unde, eligendi odit distinctio quibusdam delectus quidem tempora eum ex quam!'
```
Para poder verlos lo puedes hacer escribiendo $post en consola o $post=Post::find(1);

## 5 modificar la ruta en el archivo web.
debe quedar de la siguiente forma.
```php
Route::get('posts/{post}', function ($id) {
    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
});
```
## 6 Crea nuevos Post como se muestra en el punto 4

## 7 En la vista posts cambia por id lo que diga slup.

## Queraria de la siguiente forma
![img](img/Taller%2020/web.png)

