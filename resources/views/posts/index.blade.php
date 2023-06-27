<x-layout>
        @include('posts._header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
            <x-post-feature-card :post="$posts[0]"/>

            <div class="lg:grid lg:grid-cols-3">
                @foreach ($posts->skip(1) as $post)
                    <x-post-valor-x :post="$post"/>                             
                @endforeach
            </div>
            @else
                <p class="text-center">No existe contenido</p>
            @endif         
        </main>
</x-layout>


