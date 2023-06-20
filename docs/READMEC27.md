# La siembra de bases de datos ahorra tiempo

## 1 vamos a modificar la tabla de posts para poder vincular un usuario.
se agregar una llave secundaria de user_id
```php
      public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
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
### Ahora debes refrescar todo
```cmd
     php artisan migrate:fresh
```
## 2 Busca el archivo DatabaseSeeder y descomenta la linea 16
### Ejecuta el siguiernte comando en consola
```php
    php artisan db:seed
```
se utiliza para ejecutar los seeders de la base de datos. Los seeders son clases especiales que se utilizan para poblar la base de datos con datos de prueba o datos iniciales.

## 3 Vamos a modificar el DatabaseSeeder para asi poder generar automaticamente los datos de la base de datos

```php
     public function run()
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

         $user=User::factory()->create();
         $personal=Category::create([
            'name'=>'Personal',
            'slug'=>'personal',
         ]);

         $family=Category::create([
            'name'=>'Family',
            'slug'=>'famyly',
         ]);
         $work=Category::create([
            'name'=>'Work',
            'slug'=>'work',
         ]);

         Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'Mi Familia Post',
            'slug'=>'my-first-post',
            'excerpt'=>'Lorem ipsum dolor',
            'body'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, quae quam. Perspiciatis quae ut laudantium molestias expedita voluptas corrupti sint pariatur! Ex, unde facilis alias doloribus dolorum ipsa voluptatem quae.'
         ]);

         Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title'=>'Mi Trabajo Post',
            'slug'=>'my-work-post',
            'excerpt'=>'Lorem ipsum dolor',
            'body'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, quae quam. Perspiciatis quae ut laudantium molestias expedita voluptas corrupti sint pariatur! Ex, unde facilis alias doloribus dolorum ipsa voluptatem quae.'
         ]);

    } 
```

## 4 En el modelo de Post agrega el siguiente codigo para asi poder obtener los usuarios vinculados
```php
           public function user()
    {
        return $this->belongsTo(User::class);
    }
```

## 5 En el modelo de User agrega el siguiente codigo para asi poder obtener los posts vinculados.
```php
        public function posts()
    {
        return $this->hasMany(Post::class);
    }
```
## se deberia ver lo siguiente.
![img](img/Taller%2027/web.png)