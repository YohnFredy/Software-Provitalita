<li>

    @if ($node['level'] < 2)
        <a wire:click="show({{ $node['id'] }})" class="hover:bg-neutral-50 transition-colors cursor-pointer">
            <div class=" space-y-2 p-2  text-primary">
                <div class=" flex items-center justify-center">
                    <div class="w-6 h-6 sm:w-8 sm:h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                    <h4 class="ml-2 text-base sm:text-xl font-bold text-primary">
                        {{ $node['username'] }}
                    </h4>
                </div>

                <div class=" flex items-center justify-center text-xs sm:text-sm">
                    <i class=" text-danger fas fa-users text-xs mr-1"></i>
                    Directos:
                    <span class="font-medium pl-1 ">{{ $node['direct_affiliates'] }}</span>
                </div>

                <div class=" flex items-center justify-center text-xs sm:text-sm">
                    <i class=" text-danger fas fa-users text-xs mr-1"></i> Total:
                    <span class="font-medium pl-1">{{ $node['total_affiliates'] }}</span>
                </div>
            </div>

        </a>
    @elseif ($node['level'] < 3)
        <a wire:click="show({{ $node['id'] }} )" class="">
            <div class=" text-[8px] text-primary">
                <h6>{{ $node['username'] }}</h6>
            </div>
        </a>
    @else
        <a wire:click="show({{ $node['id'] }})">
        </a>
    @endif

    @if (!empty($node['children']))
        <ul>
            @foreach ($node['children'] as $child)
                @include('livewire.office.children-unilevel', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>
