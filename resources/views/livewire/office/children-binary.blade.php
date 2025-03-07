<li>
    @if ($node['level'] < 1)
        <a class="hover:text-zinc-900" wire:click="show({{ $node['id'] }})">
            <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm ">
                <div class="col-span-2 text-zinc-600 font-bold">
                    <h4 class=" text-lg font-bold capitalize">{{ $node['username'] }}</h4>
                </div>

                <div class="col-span-1">
                    <h5 class="text-red-700 font-bold">Left</h5>
                </div>
                <div class="col-span-1">
                    <h5 class="text-red-700 font-bold">Right</h5>
                </div>

                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Usr:</span> {{ $node['left'] }}
                    </h6>
                </div>
                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Usr:</span> {{ $node['right'] }}
                    </h6>
                </div>

                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Pts:</span> 10000
                    </h6>
                </div>
                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Pts:</span> 100076
                    </h6>
                </div>
            </div>
        </a>
    @elseif ($node['level'] < 2)
        <a class=" " wire:click="show({{ $node['id'] }})">
            <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                <div class="col-span-2 text-zinc-600 font-bold">
                    <h4 class="text-base font-bold capitalize">{{ $node['username'] }}</h4>
                </div>

                <div class="col-span-1">
                    <h5 class="text-red-700 font-bold">Left</h5>
                </div>
                <div class="col-span-1">
                    <h5 class="text-red-700 font-bold">Right</h5>
                </div>

                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Usr:</span> {{ $node['left'] }}
                    </h6>
                </div>
                <div class="col-span-1">
                    <h6 class="text-zinc-600">
                        <span class="text-zinc-800 font-semibold">Usr:</span> {{ $node['right'] }}
                    </h6>
                </div>
            </div>
        </a>
    @elseif ($node['level'] < 3)
        <a class=" " wire:click="show({{ $node['id'] }})">
            <div class="text-zinc-600 font-bold">
                <h4 class="text-xs capitalize">{{ $node['username'] }}</h4>
            </div>
        </a>
    @elseif ($node['level'] < 4)
        <a class=" " wire:click="show({{ $node['id'] }})">
            <div class=" text-zinc-600 ">
                <h4 class="text-xs capitalize">{{ $node['username'] }}</h4>
            </div>
        </a>
    @else
        <a wire:click="show({{ $node['id'] }})">
        </a>
    @endif

    @if (!empty($node['children']))
        <ul>
            @foreach ($node['children'] as $child)
                @include('livewire.office.children-binary', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>
