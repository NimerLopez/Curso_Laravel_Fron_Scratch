<x-layout>
    <x-setting heading="Publish New Post">
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/> 
            <x-form.input name="thumbnail" type="file"/>         
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>
            <x-form.field>
                <x-form.label name="category"/>
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
                <x-form.error name="category"/>
            </x-form.field>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting >   
</x-layout>
