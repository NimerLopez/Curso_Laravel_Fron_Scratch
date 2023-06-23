[< Volver al índice](/docs/README.md)
# Turbo Boost Con Fábricas

## 1 vamos a ejecutar el siguiente comando en consola.
En Laravel, los factories son utilizados para generar datos de prueba de manera fácil y rápida. Los factories proporcionan una forma conveniente de crear registros de base de datos con datos aleatorios o personalizados para su uso en pruebas, población de bases de datos o cualquier otro escenario donde se requieran datos ficticios
```php
   App\Models\User::factory()->create();
```

## 2 Vamos a crear un factory para los Post
```php
    php artisan make:factory PostFactory
```
### vamos a modificar el archivo.
```php
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'title'=>$this->faker->sentence,
            'slug'=>$this->faker->slug,
            'excerpt'=>$this->faker->sentence,
            'body'=>$this->faker->paragraph
        ];
    }
```
### Ejecuta el siguiernte comando 
```php
   php artisan make:model Comment -mf    
```
se crearán tres archivos: Comment.php en el directorio app/Models, un archivo de migración para la tabla de comentarios y un factory para generar datos de prueba para los comentarios. Esto proporciona una base sólida para trabajar con el modelo Comment en Laravel.

## 3 Vamos a crear un factory para Category
```cmd
    php artisan make:factory CategoryFactory   
```
### vamos a modificar el archivo.
```php
        public function definition()
    {
        return [
           'name'=>$this->faker->word,
           'slug'=>$this->faker->slug,
        ];
    }
```
## 4 Vamos a ir al database seeder para utomatizar el proceso
Borra o comenta todo lo que tenias y agrega el siguiente codigo.
```php
    Post::factory()->create();//genera los datos mediante factorys
```
## 4 Ejecuta el siguiernte comando para crear los datos
```php
    php artisan db:seed
```
### Quedaria de la siguiente forma
![img](img/Taller%2028/web.png)