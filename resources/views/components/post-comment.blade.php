@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img class="rounded-xl" src="https://i.pravatar.cc/60?u={{$comment->user_id}}" width="60" height="60"
                style="max-width: 100px;" alt="auto">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username}}</h3>

                <p class="text-xs">Publicado <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time> </p>
            </header>
            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>