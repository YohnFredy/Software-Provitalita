<div>
    <div class="bg-white rounded-lg shadow-md shadow-ink p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Gestión de Órdenes</h2>

            <!-- Botón global para subir puntos -->
            @if ($approvedOrdersCount > 0)
                <flux:button wire:click="uploadAllPoints" variant="primary">
                    Subir puntos para todas ({{ $approvedOrdersCount }})
                </flux:button>
            @endif
        </div>

        <!-- Filtro por estado -->
        <x-select-l wire:model.live="selectedStatus" label="Filtrar por estado:" for="status-filter">
            <option value="">Todos los estados</option>
            @foreach ($orderStatuses as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </x-select-l>


        <!-- Tabla de órdenes -->
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-neutral-500">
                <thead class="text-xs text-ink uppercase bg-neutral-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">Número</th>
                        <th scope="col" class="py-3 px-6">Fecha</th>
                        <th scope="col" class="py-3 px-6">Cliente</th>
                        <th scope="col" class="py-3 px-6">Contacto</th>
                        <th scope="col" class="py-3 px-6">Tipo de Envío</th>
                        <th scope="col" class="py-3 px-6">Total</th>
                        <th scope="col" class="py-3 px-6">Estado</th>
                        <th scope="col" class="py-3 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="bg-white border-b hover:bg-neutral-50">
                            <td class="py-4 px-6 font-medium text-neutral-900">#{{ $order->public_order_number }}</td>
                            <td class="py-4 px-6">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-6">{{ $order->user->name }}</td>
                            <td class="py-4 px-6">
                                {{ $order->contact }}<br>
                                <span class="text-neutral-500 text-xs">{{ $order->phone }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->envio_type === 'delivery' ? 'bg-primary/10 text-primary' : 'bg-neutral-100 text-neutral-800' }}">
                                    {{ $order->envio_type === 'delivery' ? 'Envío a domicilio' : 'Retiro en tienda' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                ${{ number_format($order->total, 2) }}<br>
                                <span class="text-neutral-500 text-xs">Puntos:
                                    {{ number_format($order->total_pts, 2) }}</span>
                            </td>
                            <td class="py-4 px-6">
                                @php
                                    $statusColors = [
                                        1 => 'bg-yellow-100 text-yellow-800', // Pendiente
                                        2 => 'bg-blue-100 text-blue-800', // Aprobada
                                        3 => 'bg-purple-100 text-purple-800', // Puntos Generados
                                        4 => 'bg-indigo-100 text-indigo-800', // Enviada
                                        5 => 'bg-neutral-100 text-neutral-800', // Entregada
                                        6 => 'bg-red-100 text-red-800', // Rechazada
                                        7 => 'bg-neutral-100 text-neutral-800', // Anulación Aprobada
                                        8 => 'bg-orange-100 text-orange-800', // Anulación Rechazada
                                    ];
                                @endphp
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$order->status] ?? 'bg-neutral-100 text-neutral-800' }}">
                                    {{ $orderStatuses[$order->status] ?? 'Desconocido' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    @if ($order->status == 2)
                                        <flux:button type="button" variant="primary" wire:click="uploadPoints({{ $order->id }})">
                                            Subir puntos
                                        </flux:button>
                                    @endif
                                    <a href="{{ route('orders.show', $order) }}">
                                        <flux:button>
                                            Ver
                                        </flux:button>

                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-6 px-6 text-center text-neutral-500">
                                No se encontraron órdenes con los filtros seleccionados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
