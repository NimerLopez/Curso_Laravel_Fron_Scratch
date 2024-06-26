[< Volver al índice](/docs/README.md)

# Crear la página de inicio de sesión

En este episodio se va a crear la vista de login 

## 1 Crea una carpeta llamada sessions y dentro de ella un componente blade llamado create

debe tener la siguiernte estructura.
```php
<x-layout>
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Log In!</h1>
        <form method="POST" action="/login" class="mt-10">
         @csrf   
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email">
                    EMAIL
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="email" 
                id="email" 
                name="email"
                value="{{ old('email')}}"
                required
                > 
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> 
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="username">
                    PASSWORD
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="password" 
                id="password" 
                name="password"
                value="{{ old('password')}}"
                required
                > 
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>  
            <div class="mb-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                </button>
            </div> 
        </form>
    </main>
</section>
</x-layout>
```
Este forms ejecuta un llamado a la rutas post login el cual debe validar y returnar una sesion en caso de estar todo correcto.

## 2 en el SesssionsController pega el siguiente codigo.

```php
        public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Bienvenido de nuevo');
        }
        
        throw ValidationException::withMessages(['email' => 'Credenciales inválidas']);     
    }
```
Este codigo valida los datos y si todo esta correcto redirecciona al home con una sesion en caso contrario muestra un error.

## 3 Pega las rutas correspondiente al login.
```php
    Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
    Route::post('login',[SessionsController::class, 'store'])->middleware('guest');
```
### Quedaria de la siguiente forma
![img](img/web.login.view.png)