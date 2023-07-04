@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 px-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img class="rounded-xl" src="https://i.pravatar.cc/60?u={{$comment->id}}" width="60" height="60" style="max-width: 100px;" alt="auto">                          
        </div>
    <div>
    <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}}</h3>

            <p class="text-xs">Publicado el  <time>{{$comment->created_at}}</time> </p>                              
    </header>
        <p>
            {{$comment->body}}
        </p>
    </div>
</article>