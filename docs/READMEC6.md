# Modificación de plantilla laravel (Implementaciones de css y js)

## 1 Borrar la plantilla de laravel
Esta plantilla de encuentra en el archivo welcome.blade.php

## 2 Agregar una estructura html como la que muestro a continuación.
Con la etiqueta link, importamos el archivo csss y con la etiqueta script se importa el js.
```html
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Nimer</title>
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>
    <h1>Hello World</h1>
</body>
</html>
```
## 3 En la carpeta public, creamos un archivo llamado app.css.
dentro de ese archivo escribimos el siguiente codigo.
```css
    body{
    background: navy;
    color: white;
    }
```
## 4 en la carpeta public, Creamos un archivo llamado app.js
dentro de ese archivo escribimos el siguiente codigo.
```js
    alert('Aqui estoy')
```
## 5 Revisar los cambios

