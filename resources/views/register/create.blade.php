<x-layout>
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Register!</h1>
        <form method="POST" action="/register" class="mt-10">
         @csrf   
        <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="name">
                    NAME
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="text" 
                id="name" 
                name="name"
                value="{{ old('name')}}"
                required
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>              
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="username">
                    USERNAME
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="text" 
                id="username" 
                name="username"
                value="{{ old('username')}}"
                required
                > 
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
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
                        Submit
                </button>
            </div> 
        </form>
    </main>
</section>
</x-layout>