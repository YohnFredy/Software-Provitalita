@props(['label' => '', 'for' => '', 'disabled' => false])

<div class="mb-5">
    <label for="{{ $for }}" class="block mb-2 text-sm font-medium text-primary ">{{ $label }}</label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'block w-full bg-neutral-50/50 border border-gray-300 text-primary text-sm rounded-lg 
                focus:outline-1 focus:outline-primary focus:bg-white p-2.5 ',
    ]) !!}>


    @error($for)
        <p {{ $attributes->merge(['class' => 'text-sm text-danger ']) }}>{{ $message }}</p>
    @enderror

</div>
