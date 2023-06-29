<x-dropdown> 
    <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 text-sm font-semibold text-left w-full lg:w-32 flex lg:inline-flex">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            </button>                            
    </x-slot>
    <x-dropdown-item href="/?{{http_build_query(request()->except('category','page'))}}" :active="request()->routeIs('home')">All</x-dropdown-item>
        @foreach ($categories as $category)
            <!-- {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}  -->
            <x-dropdown-item href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category','page'))}}"
                :active="request()->is('categories/' . $category->slug)">
                {{ $category->name }}
            </x-dropdown-item>
        @endforeach
</x-dropdown>