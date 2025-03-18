<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProductShow extends Component
{
    public Product $product;
    public int $quantity = 1;
    public int $currentImageIndex = 0;
    
    public function mount(Product $product)
    {
        $this->product = $product;
    }
    
    public function incrementQuantity()
    {
        if ($this->product->is_physical && $this->product->stock !== null) {
            if ($this->quantity < $this->product->stock || $this->product->allow_backorder) {
                $this->quantity++;
            }
        } else {
            $this->quantity++;
        }
    }
    
    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    
    public function changeImage($index)
    {
        $this->currentImageIndex = $index;
    }
    
    public function addToCart()
    {
        // Aquí implementarías la lógica para agregar al carrito
        // Por ejemplo, usando un servicio de carrito o un evento
        $this->dispatch('product-added', [
            'productId' => $this->product->id,
            'quantity' => $this->quantity
        ]);
        
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Producto añadido al carrito'
        ]);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.product.product-show');
    }
}
