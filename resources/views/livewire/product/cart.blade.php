<div class="grid grid-cols-6 gap-6">
    <div class=" col-span-6 md:col-span-4 ">
        <h2 class=" text-primary  border-b sm:border-none border-neutral-400 pb-2 sm:pb-0">Carro ({{ $quantity }} productos)
        </h2>
        <div class=" sm:bg-white rounded-md sm:shadow-md shadow-ink sm:border border-neutral-300 sm:p-4 mt-2">
            <div class=" grid grid-cols-12 gap-2 mt-2">
                @if ($products)
                    @foreach ($products as $product)
                        <div class="col-span-3 lg:col-span-1 flex items-center justify-center">
                            <img class=" w-16 h-16 rounded-md border border-neutral-300"
                                src="{{ asset('storage/' . $product['path']) }}" alt="{{ $product['name'] }}">
                        </div>
                        <div class="col-span-9 lg:col-span-5 flex items-center">
                            <div class=" text-sm text-primary">
                                <p class=" font-bold">
                                    {{ $product['name'] }}
                                </p>
                                <p class="mt-2 text-justify  line-clamp-3 text-ink">
                                    {!! Str::limit($product['description'], 50) !!}</p>
                            </div>
                        </div>

                        <div class="col-span-4 lg:col-span-2 flex items-center justify-center">
                            <div class="text-sm">
                                <p class=" text-primary">
                                    ${{ number_format($product['price'], 0) }}
                                </p>

                              {{--   <p class=" text-premium mt-2"> Pts_base: {{ $product['pts_base'] }}</p> --}}
                            </div>
                        </div>

                        <div class="col-span-7 lg:col-span-3 flex items-center justify-center">
                            <div>
                                <button wire:click="decrement({{ $product['index'] }})"
                                    class="bg-primary  py-1 px-3 rounded-md hover:bg-secondary  text-neutral-200 hover:text-white ">-</button>
                                <input type="text"
                                    class="text-center p-0 w-10 border-none focus:outline-none focus:ring-0 focus:border-none focus:shadow-none "
                                    wire:model.live="products.{{ $product['index'] }}.quantity"
                                    value="{{ $product['quantity'] }}">
                                <button wire:click="increment({{ $product['index'] }})"
                                    class="bg-primary  py-1 px-3 rounded-md hover:bg-secondary  text-neutral-200 hover:text-white ">+</button>
                            </div>
                        </div>

                        <div wire:click="removeFromCart({{ $product['index'] }})"
                            class="col-span-1 lg:col-span-1 flex items-center justify-center cursor-pointer text-danger hover:text-danger/80">
                            <i class="  text-lg fas fa-trash"></i>
                        </div>

                        <div class="col-span-12">
                            <div class=" my-2 border-b border-neutral-400">
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class=" col-span-12  flex items-center justify-center">

                        <p class=" py-4 text-lg font-bold">No hay productos en el carro</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-span-6 md:col-span-2">
        <h2 class=" text-primary">Resumen de la orden</h2>
        <div class=" bg-white  rounded-md shadow-md shadow-ink border border-neutral-300 p-2  sm:p-4 mt-2">
            <ul class="divide-y divide-neutral-300">
                <li class=" flex justify-between py-2">
                    <p>Productos ({{ $quantity }})
                    </p>
                    <p> ${{ number_format($total, 0) }}</p>
                </li>

                <li class=" flex justify-between py-2">
                    <p>Subtotal:
                    </p>
                    <p> ${{ number_format($total, 0) }}</p>
                </li>
            </ul>

            <div class=" flex justify-center mt-6">
                @if ($quantity < 1)
                    <flux:button variant="primary" disabled>Continuar compra </flux:button>
                @else
                    <a href="{{ route('orders.create') }}">
                        <flux:button variant="primary">Continuar compra</flux:button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
