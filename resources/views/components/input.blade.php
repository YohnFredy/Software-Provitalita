@props(['label' => '', 'for' => '', 'disabled' => false])

<div class="mb-5">
    <label for="{{ $for }}" class="block mb-2 text-sm font-medium text-primary">
        {{ $label }}
    </label>

    <input 
        {{ $disabled ? 'disabled' : '' }} 
        {!! $attributes->merge([
            'class' => 'block w-full border text-sm rounded-lg p-2.5 focus:outline-1 ' . 
                        ($disabled 
                            ? 'bg-neutral-50/20 text-neutral-400 border-neutral-100 cursor-not-allowed' 
                            : 'bg-neutral-50/50 border-gray-300 text-primary focus:outline-primary focus:bg-white')
        ]) !!}
    >

    @error($for)
        <p {{ $attributes->merge(['class' => 'text-sm text-danger']) }}>{{ $message }}</p>
    @enderror
</div>

