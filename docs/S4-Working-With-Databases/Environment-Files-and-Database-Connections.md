[< Volver al índice](/docs/README.md)
# Archivos de entorno y conexiones de base de datos

En Laravel, los archivos de entorno juegan un papel crucial en la configuración de la aplicación. Estos archivos, como .env, permiten que la configuración de la aplicación varíe según el entorno en el que se ejecute, como desarrollo, prueba o producción. El archivo .env se utiliza para almacenar variables de entorno, como las credenciales de la base de datos, claves de API, configuraciones de correo electrónico, etc.

La configuración de la base de datos es una de las partes clave que se definen en el archivo de entorno. En este archivo, puedes especificar los detalles de conexión de la base de datos, como el controlador de la base de datos, el host, el nombre de la base de datos, el nombre de usuario y la contraseña. Estos valores se utilizan para establecer la conexión con la base de datos cuando tu aplicación Laravel necesita interactuar con ella.

## En la terminal nos conectamos a la base datos
### vamos a crear la base de datos
```cmd
    sudo mysql
    create database blog;
```
##  2  vamos a la ruta de nuestro proyecto y ejecuta el siguiente coamndo
se utiliza para ejecutar las migraciones de la base de datos.
```cmd
    php artisan migrate
```

## 3 Volvemos a ingresar a la base de datos y ejecuta los siguientes comandos
```cmd
    use blog;
    show tables;
```
tendria que salir lo siguiente.

![img](img/Taller%2017/1.png)
### Se recomienda usar esta aplicacion para ver la base de datos.
[TablePlus for Windows](https://tableplus.com/windows)
