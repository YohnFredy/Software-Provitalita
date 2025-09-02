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
    public $modalCart = false;
    public $cart = [];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->cart = session()->get('cart', []);
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
        $this->cart = session()->get('cart', []);

        // Buscar el índice del producto en el carrito
        $index = array_search($this->product->id, array_column($this->cart, 'id'));

        if ($index !== false) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $this->cart[$index]['quantity'] += $this->quantity;
        } else {
            // Si no está en el carrito, agregarlo
            $this->cart[] = [
                'id' => $this->product->id,
                'quantity' => $this->quantity,
            ];
        }

        // Guardar el carrito en la sesión
        session()->put('cart', $this->cart);

        // Mostrar el modal del carrito
        $this->modalCart = true;

        // Refrescar los datos del carrito en Livewire
        $this->cart = session()->get('cart', []);

        $this->dispatch('update-cart'); 
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.product.product-show', [
            'cartItems' => session()->get('cart', [])
        ]);
    }
}
