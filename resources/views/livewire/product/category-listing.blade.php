<div class="w-ful" x-data="{ openCategories: {} }" x-cloak> 
    <h3 class="text-lg font-medium text-palette-400">Categorías</h3>

    <ul class=" text-palette-200 divide-y-1 divide-palette-300 px-2">
        @foreach ($categories as $category)
            @include('partials.category-item', ['category' => $category, 'level' => 0])
        @endforeach
    </ul>
</div>








