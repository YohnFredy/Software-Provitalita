<?php

namespace App\Livewire\Product;

use App\Models\Category;
use Livewire\Component;

class CategoryListing extends Component
{

    public $categories;

    public function mount()
    {
        $this->categories = Category::whereNull('parent_id')->where('is_active', 1)->get();
    }

    public function category($category_id)
    {

        $this->dispatch('showCategory', id: $category_id);
        
    }

    
    public function render()
    {
        return view('livewire.product.category-listing');
    }
}
