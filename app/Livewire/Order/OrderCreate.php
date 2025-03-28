<?php

namespace App\Livewire\Order;

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
    public $cart = [], $products = [];

    public $user_id, $quantity = 0, $subTotal = 0, $discount = 0, $shipping_cost = 0, $total = 0, $total_pts = 0, $tipo_usuario = 'inactive';

    public $countries = [], $departments = [], $cities = [];

    public $name = '', $phone = '', $envio_type = 2, $selectedCountry, $selectedDepartment, $selectedCity,  $city = '', $address = '', $additionalAddress = '', $terms = false;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
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

        if (!$user->activation) {
            $cantPts = 0;
            if (!empty($this->cart)) {
                $productIds = collect($this->cart)->pluck('id')->toArray();
                $products = Product::whereIn('id', $productIds)->get();

                foreach ($products as $product) {
                    $quantity = collect($this->cart)->firstWhere('id', $product->id)['quantity'] ?? 0;
                    $cantPts += $product->pts_bonus * $quantity;
                }
            }

            if ($cantPts >= 3.30) {
                $this->tipo_usuario = "new_affiliate";
            }
        } else {
            $this->tipo_usuario = $user->activation->is_active ? "active" : "inactive";
        }

        $this->showProducts();
        $this->countries = Country::all();
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

    public function showProducts()
    {
        $this->products = [];
        $this->subTotal = 0;
        $this->total_pts = 0;
        $this->quantity = 0;

        if (empty($this->cart)) {
            return;
        }

        $productIds = collect($this->cart)->pluck('id')->toArray();
        $products = Product::whereIn('id', $productIds)->with('latestImage')->get();

        foreach ($this->cart as $index => $item) {
            $product = $products->firstWhere('id', $item['id']);

            if (!$product) {
                continue; // Evita errores si el producto no existe
            }

            $ptsValue = match ($this->tipo_usuario) {
                'new_affiliate' => $product->pts_bonus,
                'active' => $product->pts_dist,
                default => $product->pts_base,
            };

            $this->products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'pts' => $ptsValue,
                'path' => optional($product->latestImage)->path,
                'quantity' => $item['quantity'],
                'index' => $index,
            ];

            // Acumulación de valores en una sola iteración
            $this->subTotal += $item['quantity'] * $product->price;
            $this->total_pts += $item['quantity'] * $ptsValue;
            $this->quantity += $item['quantity'];
        }

        $this->billingProcess();
    }

    public function billingProcess()
    {
        $this->total = $this->subTotal - $this->discount + $this->shipping_cost;
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

        foreach ($this->products as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' =>  $product['id'],
                'name' =>  $product['name'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'discount' => 0,
                'tax' => 0,
                'subtotal' => $product['quantity'] * $product['price'],
                'pts' => $product['pts'],
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
