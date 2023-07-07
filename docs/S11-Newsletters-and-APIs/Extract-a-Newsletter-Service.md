[< Volver al índice](/docs/README.md)

# Extraer un servicio de boletín

## 1 Crear una nueva carpeta dentro de app llamada services
Desbes crear una clase php llamda Newsletter.
En esta clase va a estar toda la logica para registrar un nuevo correo a nuestros registros mendiante la api de Mailchimp.
```php
    <?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');
        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us17'
        ]);
    }
}
```
- config('services.mailchimp.lists.subscribers') obtiene el valor de configuración correspondiente a la clave 'subscribers' dentro del arreglo 'lists' en la configuración del servicio de Mailchimp. Esto se basa en el archivo de configuración services.php donde tienes definida la configuración de Mailchimp.

- $list ??= es el operador de fusión de null. Si la variable $list es null o no tiene un valor asignado previamente, se asignará el valor obtenido de la configuración (config('services.mailchimp.lists.subscribers')). Sin embargo, si la variable $list ya tiene un valor asignado, la expresión se omite y no se realiza ninguna asignación.

## 2 Guardar en el archivo .env el id de la lista de de la api.

```env
   MAILCHIMP_LIST_SUBSCRIBERS=ab21b4a70e
```
Tambien debes modificar el archivo services para que pueda acceder a este id.
```php
       'mailchimp' => [
        'key' => env('MAILCHIMP_KEY'),
        'lists' => [
            'subscribers' => env('MAILCHIMP_LIST_SUBSCRIBERS')
        ]
    ],
```
## 3  Generar un nuevo controlado con el siguiente comando.
debe hacerse en la raiz del proyecto.

```cmd
    php artisan make:controller NewsletterController
```
### El controlador debe tener la ruta que se encarga de Guardar en la api el servicio de gmail.

```php
 public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }

        return redirect('/')->with('success', '¡Ahora estás suscrito a nuestro boletín!');
    }
```
- request()->validate(['email' => 'required|email']);: Aquí se valida la solicitud actual utilizando las reglas de validación especificadas. En este caso, se asegura de que el campo 'email' esté presente y sea una dirección de correo electrónico válida.

- $newsletter->subscribe(request('email'));: Aquí se llama al método subscribe del servicio Newsletter y se pasa el valor del campo 'email' de la solicitud. Esto es para suscribir el correo electrónico proporcionado a la lista de suscriptores.

## 4 Modificar la rutas en el archivo web

```php
    Route::post('newsletter',NewsletterController::class);
```
### Quedaria de la siguiente forma
![img](img/page.info.estructure.png)
