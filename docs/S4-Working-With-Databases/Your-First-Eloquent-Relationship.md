[< Volver al índice](/docs/README.md)
# Tus primeras relaciones elocuentes

## 1 vamos a crear un documento migration para las categories
```cmd
    php artisan make:migration create_categories_table

     php artisan make:model Category -m
```

## 2 Vamos a editar el migrador creado con la siguiente estructura
```php
      public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
    }
```
## 3 vamos a vincular La estructura del Post con las categorias
mediante una llave secundaria.
```php
        {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('excerpt');
            $table->string('body');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }
```

## 4 Se van a crear 3 Categorias 
Repites este codigo en consolo 3 veces con diferentes datos
```cmd
    use App\Models\Category;
    $c = new Category;
    $c->name ='Personal'
    $c->slug ='Personal'
    $c->save()
```

## 5 Crea 3 Post con la siguiente estructura
```php
Post::create(['title'=>'Mi tercer Post', 'excerpt'=>'Ya valio el valor','category_id'=>1,'slug'=>'my-thirt-post' ,'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis sequi ipsam quibusdam est velit! Obcaecati cupiditate numquam rerum placeat unde, eligendi odit distinctio quibusdam delectus quidem tempora eum ex quam!'])
```
### El link de la vista post tambien debe ser modificado por slug
```php
<a href="/posts/{{ $post->slug }}">
```

## 6 Vamos a crear una metodo en el modelo Post para traer el nombre de la categoria
```php
     class Post extends Model
{
    use HasFactory;

    protected $guarded=[];
    //protected $fillable = ['title','excerpt','body'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
```
## 7 Agrega una etiqueta a al posts para poder ver la categoria.
```php
<a href="#">{{$post->category->name}}</a>
```

### Quedaria de la siguiente forma
![img](img/Taller%2024/web.png)