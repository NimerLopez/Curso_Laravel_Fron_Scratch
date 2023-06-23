[< Volver al índice](/docs/README.md)
# 3 formas de mitigar las vulnerabilidades de asignación masiva

## 1 Vamos a crear un nuevo Post.

se realiza desde la consola
```php
    use App\Models\Post;
     $post= new Post;
     $post->title='My Segundo Post'
     $post->excerpt='valor por valor igual valor'
     $post->body='Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis sequi ipsam quibusdam est velit! Obcaecati cupiditate numquam rerum placeat unde, eligendi odit distinctio quibusdam delectus quidem tempora eum ex quam!'
     $post->save()
```

##  2  Con el siguiente codigo traemos todos los Post.
```php
    Post::all();
```
## 3 Vamos a probar una nueva forma de agregar al Post
agregar datos masivos.
```php
 use App\Models\Post;

 Post::create(['title'=>'El Valor X', 'excerpt'=>'Ya valio el valor', 'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis sequi ipsam quibusdam est velit! Obcaecati cupiditate numquam rerum placeat unde, eligendi odit distinctio quibusdam delectus
quidem tempora eum ex quam!'])
```
Este no va a funcionar por que los valores son muy grande.

## 4 Vamos a modificar el modelo Post con el siguiente codigo
```php
    class Post extends Model
{
    use HasFactory;

   protected $fillable = ['title','excerpt','body'];

}
```
se utiliza para especificar qué atributos se pueden asignar de forma masiva al crear o actualizar un modelo.

### tambien se puede hacer de esta forma.

```php
protected $guarded=[];
```

