<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Title
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="title"
                id="title"
                value="{{old('title')}}"
                required
                >
                @error('title')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Slug
                </label>
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="slug"
                id="slug"
                value="{{old('slug')}}"
                required
                >
                @error('slug')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full"
                type="text"
                name="excerpt"
                id="excerpt"
                required
                >
                {{old('excerpt')}}
                </textarea>
                @error('excerpt')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Body
                </label>
                <textarea class="border border-gray-400 p-2 w-full"
                type="text"
                name="body"
                id="body"
                required
                >
                {{old('body')}}
                </textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    category
                </label>
                <select name="category_id" id="category_id">
                @foreach (\App\Models\Category::all() as $category)
                    @if (!empty(trim($category->name)) && $category->posts->count() > 0)
                        <option 
                            value="{{$category->id}}" {{old( 'category_id' ) == $category->id? 'selected' : '' }}>
                            {{ucwords($category->name)}}
                        </option>
                    @endif
                @endforeach

                    
                </select>
                @error('category_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            

            <x-submit-button>Publish</x-submit-button>
        </form>
        </x-panel>
    </section>
</x-layout>
