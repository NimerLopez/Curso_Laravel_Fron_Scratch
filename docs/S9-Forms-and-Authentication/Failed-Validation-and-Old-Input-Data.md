[< Volver al índice](/docs/README.md)

# Validación fallida y datos de entrada antiguos

## ¿Por que es importante mostrar los errores?

- Tenemos que tomar en cuenta que debemos mostrar los errores ya que si no se hace el usuario nunca sabra en que esta fallando al momento de registrarse.

## ¿Que pasa si escribo datos existententes?

- Al momento de escribir datos existentes el programa los tomara como validos pero al momento de guardarse en la base de datos, la pagina se va a caer ya que estos son valores unicos.

## 1 Implementar otro filtro en el controlador para valores unicos
```php
            $attributes=request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|min:3|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:6|max:255'
        ]);
```
la clausula unique evita que valores de la tabla user en el espacio username esten repetidos.


## 2 Mostrar los errores en la pagina
Implementa el siguiernte error en la parte inferior de cada input para mostrar el error
```php
    @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
```
si existe un error se muestra un parrafo rojo mesionando el error.

### Quedaria de la siguiente forma
![img](img/web.error.png)