<?php

namespace App\Livewire\Order;

use App\Models\ActivationPt;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class OrderCreate extends Component
{
    public $cart = [], $products = [], $productItems = [], $activationPt;

    public $user_id, $quantity = 0, $subTotal = 0, $discount = 0, $shipping_cost = 0, $total = 0, $total_pts = 0, $tipo_usuario = 'inactive';

    public $countries = [], $departments = [], $cities = [];

    public $name = '', $phone = '', $dni = '', $email = '', $envio_type = 2, $selectedCountry, $selectedDepartment, $selectedCity,  $city = '', $address = '', $additionalAddress = '', $terms = false;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'dni' => 'required|min:3',
            'email' => 'required|email|min:3',
            'envio_type' => 'required|in:1,2',
            'selectedCountry' => Rule::requiredIf($this->envio_type == 2),
            'selectedDepartment' => Rule::requiredIf($this->envio_type == 2),
            'selectedCity' => Rule::requiredIf($this->envio_type == 2 && empty($this->city)),
            'city' => Rule::requiredIf($this->envio_type == 2 && empty($this->selectedCity)),
            'address' => Rule::requiredIf($this->envio_type == 2),
            'terms' => 'required|accepted',
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->cart = session('cart', []);

        $productIds = collect($this->cart)->pluck('id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $this->products = collect($this->cart)->map(function ($item, $index) use ($products) {
            $product = $products[$item['id']] ?? null;
            return $product ? [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'tax' => 0,
                'pts_base' => $product->pts_base,
                'pts_bonus' => $product->pts_bonus,
                'pts_dist' => $product->pts_dist,
                'maximum_discount' => $product->maximum_discount,
                'quantity' => $item['quantity'],
                'index' => $index,
            ] : null;
        })->filter()->sortBy('pts_base')->values()->all();

        $this->activationPt = ActivationPt::first();

        if (!$user->activation) {
            $cantPts = collect($this->products)->sum(fn($product) => $product['pts_bonus'] * $product['quantity']);
            $this->tipo_usuario = $cantPts >= $this->activationPt->min_pts_first ? "new_affiliate" : null;
        } else {
            $this->tipo_usuario = $user->activation->is_active ? "active" : "inactive";
        }

        $this->showProducts();
        $this->countries = Country::all();
    }

    public function showProducts()
    {
        $accumulatedPts = 0;
        $this->productItems = [];

        foreach ($this->products as $product) {
            if ($this->tipo_usuario === 'inactive') {
                $quantityProcessed = 0;

                // Procesar productos hasta alcanzar el mínimo de activación
                while ($quantityProcessed < $product['quantity']) {
                    $accumulatedPts += $product['pts_base'];
                    $quantityProcessed++;

                    if ($accumulatedPts >= $this->activationPt->min_pts_monthly) {
                        $this->tipo_usuario = 'active';
                        break;
                    }
                }

                // Agregar la parte de activación
                $this->productItems[] = $this->getProductItem(
                    $product,
                    $quantityProcessed,
                    0, // Sin descuento en esta parte
                    $product['pts_base']
                );

                // Si queda saldo después de la activación, aplicar descuento
                $remainingQuantity = $product['quantity'] - $quantityProcessed;
                if ($remainingQuantity > 0) {
                    $this->productItems[] = $this->getProductItem(
                        $product,
                        $remainingQuantity,
                        $product['price'] * $product['maximum_discount'] / 100,
                        $product['pts_dist']
                    );
                }
            } else {
                // Para 'new_affiliate' y 'active'
                $this->productItems[] = $this->getProductItem(
                    $product,
                    $product['quantity'],
                    $this->tipo_usuario === 'active' ? ($product['price'] * $product['maximum_discount'] / 100) : 0,
                    $this->tipo_usuario === 'new_affiliate' ? $product['pts_bonus'] : $product['pts_dist']
                );
            }
        }

        $this->billingProcess();
    }

    /**
     * Método auxiliar para generar la estructura de producto
     */
    private function getProductItem($product, $quantity, $discount, $pts)
    {
        return [
            'product_id' => $product['id'],
            'name' => $product['name'],
            'quantity' => $quantity,
            'price' => $product['price'],
            'discount' => $discount,
            'tax' => $product['tax'],
            'subtotal' => $product['price'] * $quantity,
            'pts' => $pts,
        ];
    }

    public function billingProcess()
    {
        // Inicializar valores
        $this->quantity = $this->discount = $this->subTotal = $this->total_pts = 0;

        foreach ($this->productItems as $productItem) {
            $this->quantity += $productItem['quantity'];
            $this->discount += $productItem['discount'] * $productItem['quantity'];
            $this->subTotal += $productItem['subtotal'];
            $this->total_pts += $productItem['pts'] * $productItem['quantity'];
        }

        $this->total = $this->subTotal - $this->discount + $this->shipping_cost;
    }

    public function onEnvioTypeChange()
    {
        if ($this->envio_type == 1) {
            $this->reset(
                [
                    'selectedCountry',
                    'departments',
                    'selectedDepartment',
                    'cities',
                    'selectedCity',
                    'city',
                    'address',
                    'additionalAddress',
                ]
            );
        }
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->reset(['departments', 'selectedDepartment', 'cities', 'selectedCity', 'city', 'shipping_cost']);
        $this->departments = Department::where('country_id', $countryId)->get();
        $this->billingProcess();
    }

    public function updatedSelectedDepartment($departmentId)
    {
        $this->reset(['cities', 'selectedCity', 'city', 'shipping_cost']);
        $this->cities = City::where('department_id', $departmentId)->get();
        $this->billingProcess();
    }


    public function updatedSelectedCity($cityId)
    {
        $this->reset('city');
        $this->shipping_cost = City::find($cityId)->cost;
        $this->billingProcess();
    }

    public function create_order()
    {
        $this->user_id = Auth::user()->id;
        $this->validate();

        $publicOrderNumber = strtoupper(dechex(time()) . bin2hex(random_bytes(4)));

        $orderData = [
            'public_order_number' => $publicOrderNumber,
            'user_id' => $this->user_id,
            'contact' => $this->name,
            'phone' => $this->phone,
            'dni' => $this->dni,
            'email' => $this->email,
            'envio_type' => $this->envio_type,
            'discount' => $this->discount,
            'shipping_cost' => $this->shipping_cost,
            'total' => $this->total,
            'total_pts' => $this->total_pts,
        ];

        if ($this->envio_type == 2) {
            $orderData = array_merge($orderData, [
                'country_id' => $this->selectedCountry,
                'department_id' => $this->selectedDepartment,
                'city_id' => $this->selectedCity,
                'addCity' => $this->city,
                'address' => $this->address,
                'additional_address' => $this->additionalAddress,
            ]);
        }
        $order = Order::create($orderData);

        foreach ($this->productItems as $productItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' =>  $productItem['product_id'],
                'name' =>  $productItem['name'],
                'quantity' => $productItem['quantity'],
                'price' => $productItem['price'],
                'discount' => $productItem['discount'],
                'tax' => $productItem['tax'],
                'subtotal' => $productItem['price'] * $productItem['quantity'],
                'pts' => $productItem['pts'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('bold.checkout', $order);
        /*  return redirect()->route('wompi.checkout', $order); */
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.order.order-create');
    }
}
