# Archivos de entorno y conexiones de base de datos

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
