<x-layouts.office>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>


        <div class=" p-6 text-center rounded-xl border border-neutral-200 dark:border-neutral-700">


            <div>
                <flux:heading size="xl">Link patrocinador lado derecho</flux:heading>
                <p id="p1" class="hidden">http://provitalita.test/register/{{ auth()->user()->username }}/right</p>
    
               <div class="space-y-2">
                    <div>
                        <flux:button variant="primary" class="cursor-pointer" onclick="copiarAlPortapapeles('p1')"> 
                            Clic para Copiar <i class="fas fa-copy mr-2"></i></flux:button> 
                    </div>
        
                    <div>
                        <flux:link class=" text-red-700 hover:text-red-500" href="{{ route('register', [auth()->user()->username, 'right']) }}">
                            Registrar lado derecho.
                        </flux:link>
                    </div>
               </div>
            </div>

            <div class="mt-6">
                <flux:heading size="xl">Link patrocinador lado izquierdo</flux:heading>
    
                <p id="p2" class="hidden">http://provitalita.test/register/{{ auth()->user()->username }}/left</p>
    
               <div class=" space-y-2">
                    <div>
                        <flux:button variant="primary" class="cursor-pointer" onclick="copiarAlPortapapeles('p2')"> 
                            Clic para Copiar <i class="fas fa-copy mr-2"></i></flux:button> 
                    </div>
        
                    <div>
                        <flux:link class=" text-red-700 hover:text-red-500 " href="{{ route('register', [auth()->user()->username, 'left']) }}">
                            Registrar lado Izquierdo.
                        </flux:link>
                    </div>
               </div>
            </div>
            

            
        </div>
    </div>

    <script>
        function copiarAlPortapapeles(id_elemento) {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
    </script>
</x-layouts.office>
