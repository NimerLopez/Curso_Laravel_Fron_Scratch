@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Quieres participar?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Quick, thing of something to say!" required></textarea>

            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.button>Submit</x-form.button>
        </div>

    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> o
    <a href="/login" class="hover:underline">log in</a> dejar un comentario.
</p>
@endauth