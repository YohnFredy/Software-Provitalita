@props([
    'name' => 'name',
    'label' => 'name',
    'options' => [],
])

<div>
    @if($label ?? false)
        <label class="block text-primary">{{ $label }}</label>
    @endif
    <div class="flex items-center pt-3 space-x-4">
        @foreach($options as $option)
            <label class="flex items-center">
                <input type="radio" name="{{ $name }}" value="{{ $option['value'] }}"
                       {{ $attributes->merge(['class' => 'w-4 h-4 bg-gray-100 border-gray-300']) }}
                       @checked(old($name) == $option['value'])>
                <span class="ms-2 text-sm font-medium text-primary ">{{ $option['label'] }}</span>
            </label>
        @endforeach
    </div>
</div>