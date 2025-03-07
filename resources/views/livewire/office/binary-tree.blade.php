@push('css')
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
@endpush

<div>
    <h1 class="font-bold mb-2 text-2xl text-zinc-800 ">Red Binaria</h1>
    <div class="flex justify-center  rounded-lg bg-white border border-zinc-300 shadow-md shadow-zinc-950 pb-8  pt-4">

        <div class="tree ">
            <ul>
                @include('livewire.office.children-binary', ['node' => $tree])
            </ul>
        </div>

    </div>

    <div class=" bg-zinc-50"></div>
</div>


