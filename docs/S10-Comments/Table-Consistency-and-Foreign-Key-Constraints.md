[< Volver al índice](/docs/README.md)

# Coherencia de tabla y restricciones de clave externa

Las foreign keys son importantes para mantener la integridad referencial de los datos, controlar la consistencia de los datos, mejorar el rendimiento de las consultas y facilitar la comprensión de la estructura de la base de datos. Ayudan a garantizar que las relaciones entre las tablas sean correctas y coherentes, lo que resulta en una base de datos más confiable y eficiente.

## 1 Vamos a crear una nueva tabla en la base de datos.
En este caso desde los migradores de laravel, con el siguiente comando creamos un nuevo migrador junto a su modelo.
```cmd
    php artisan make:model Comment -mfc
```


## 2 Vamos a editar el migrador creado.

```php
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('body');
            $table->timestamps();
        });
    }
```
- $table->foreignId('post_id'): Crea una columna llamada 'post_id' en la tabla 'comments' que será una clave foránea. Esta columna se utilizará para almacenar el identificador del post al que está asociado el comentario.

- constrained(): Esta llamada a la función constrained() establece la restricción de clave foránea en la columna 'post_id'. Esto significa que la columna 'post_id' está vinculada a otra tabla (por convención, la tabla 'posts') y se asegura de que los valores almacenados en la columna 'post_id' existan en la tabla 'posts'. Esta restricción garantiza la integridad referencial de los datos.

- cascadeOnDelete(): Esta llamada a la función cascadeOnDelete() establece la acción de cascada en la clave foránea. Esto significa que si un post asociado a un comentario se elimina en la tabla 'posts', automáticamente se eliminará también el comentario correspondiente en la tabla 'comments'. Esta acción de cascada ayuda a mantener la consistencia de los datos cuando se eliminan registros relacionados.
