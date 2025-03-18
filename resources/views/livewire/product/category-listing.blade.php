<div class="w-ful" x-data="{ openCategories: {} }" x-cloak> 
    <h3 class="text-lg font-medium text-danger">Categorías</h3>

    <ul class=" text-primary px-2">
        @foreach ($categories as $category)
            @include('partials.category-item', ['category' => $category, 'level' => 0])
        @endforeach
    </ul>
</div>








