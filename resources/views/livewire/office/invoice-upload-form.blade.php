<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-4 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- ... (Header sin cambios) ... -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Registro de Facturas</h1>
            <p class="text-gray-600">Complete la información de la factura. Si carga una imagen, intentaremos leerla por
                usted.</p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden" x-data="{
            isProcessingOcr: @entangle('isProcessingOcr').live,
            ocrStatusMessage: @entangle('ocrStatusMessage').live,
            ocrDataFound: @entangle('ocrDataFound').live
        }" x-init="Livewire.on('formReset', () => {
            if ($refs.imageInput) $refs.imageInput.value = null;
        });
        Livewire.on('formSubmitted', () => {
            if ($refs.imageInput) $refs.imageInput.value = null;
        });">

            @if (session()->has('message'))
                <!-- ... (Success Message sin cambios) ... -->
            @endif

            <div class="p-6 sm:p-8 lg:p-10">
                <form class="space-y-8" wire:submit.prevent="save"> {{-- Cambiado a wire:submit.prevent --}}
                    <!-- Merchant Search Section (sin cambios) -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                        <!-- ... -->
                    </div>

                    <!-- Location Section (sin cambios si $selectedMerchant) -->
                    @if ($selectedMerchant)
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                            <!-- ... -->
                        </div>
                    @endif

                    <!-- Invoice Details Section -->
                    <div class="bg-gradient-to-r from-green-50 to-teal-50 rounded-xl p-6 border border-green-100">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">3</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Datos de la Factura (Autocompletados por OCR
                                si es posible)</h3>
                        </div>

                        {{-- MENSAJE DE ESTADO OCR --}}
                        <div x-show="ocrStatusMessage" class="mb-4 p-4 rounded-md text-sm"
                            :class="{
                                'bg-blue-100 text-blue-700': isProcessingOcr,
                                'bg-green-100 text-green-700': !isProcessingOcr && ocrDataFound,
                                'bg-yellow-100 text-yellow-700': !isProcessingOcr && !ocrDataFound && ocrStatusMessage
                                    .length > 0 && !ocrStatusMessage.toLowerCase().includes('error'),
                                'bg-red-100 text-red-700': !isProcessingOcr && ocrStatusMessage.toLowerCase().includes(
                                    'error')
                            }"
                            x-text="ocrStatusMessage">
                        </div>
                        {{-- FIN MENSAJE DE ESTADO OCR --}}


                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div>
                                <label for="invoice_number_ocr" class="block text-sm font-medium text-gray-700 mb-2">
                                    Número de Factura
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    {{-- Usar wire:model.defer para que no actualice en cada tecleo, solo al enviar o perder foco --}}
                                    <input type="text" id="invoice_number_ocr" wire:model.defer="invoice_number_ocr"
                                        :disabled="isProcessingOcr"
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                                        placeholder="Ej: FAC-001234">
                                    <!-- ... (icono) ... -->
                                </div>
                                @error('invoice_number_ocr')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">...</p>
                                @enderror
                            </div>

                            <div>
                                <label for="total_amount_ocr" class="block text-sm font-medium text-gray-700 mb-2">
                                    Monto Total
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" step="0.01" id="total_amount_ocr"
                                        wire:model.defer="total_amount_ocr" :disabled="isProcessingOcr"
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                                        placeholder="0.00">
                                    <!-- ... (icono) ... -->
                                </div>
                                @error('total_amount_ocr')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">...</p>
                                @enderror
                            </div>

                            <div>
                                <label for="invoice_date_ocr" class="block text-sm font-medium text-gray-700 mb-2">
                                    Fecha de la Factura
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="date" id="invoice_date_ocr" wire:model.defer="invoice_date_ocr"
                                        :disabled="isProcessingOcr"
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                                    <!-- ... (icono) ... -->
                                </div>
                                @error('invoice_date_ocr')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">...</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-6 border border-orange-100">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">4</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Foto de la Factura</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subir Imagen (Max. 10MB)
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="file" accept="image/*" capture="environment" id="image"
                                        wire:model="image" {{-- wire:model aquí para que dispare updatedImage --}} x-ref="imageInput"
                                        :disabled="isProcessingOcr"
                                        class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-orange-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all cursor-pointer">
                                    <!-- ... (placeholder SVG que tenías) ... -->
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">...</p>
                                @enderror

                                {{-- INDICADOR DE CARGA OCR --}}
                                <div wire:loading wire:target="image" class="mt-2 text-sm text-blue-600">
                                    Cargando imagen...
                                </div>
                                <div x-show="isProcessingOcr" class="mt-2 text-sm text-blue-600 flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Procesando con OCR...
                                </div>
                                {{-- FIN INDICADOR DE CARGA OCR --}}
                            </div>

                            @if ($image && !$errors->has('image'))
                                {{-- Añadido !$errors->has('image') para no mostrar si hay error de validación de imagen --}}
                                <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                                    <!-- ... (Previsualización de la imagen sin cambios) ... -->
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                            <div class="text-center sm:text-left">
                                <p class="text-sm text-gray-600">¿Todo listo? Revisa la información antes de continuar
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Los campos marcados con * son obligatorios</p>
                            </div>
                            {{-- Cambiado el type a "submit" y deshabilitado durante OCR o guardado --}}
                           <button type="submit" id="save-button"
                                    :disabled="isProcessingOcr" 
                                    wire:loading.attr="disabled" wire:target="save, image" {{-- Añadido image aquí también --}}
                                    class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 border border-transparent rounded-lg shadow-sm text-base font-medium text-white hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                
                                {{-- Estado de carga del botón (para la acción save) --}}
                                <div wire:loading wire:target="save" role="status" class="inline-flex items-center">
                                    <svg aria-hidden="true" class="inline w-5 h-5 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0492C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5424 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span id="button-text-saving">Guardando...</span>
                                </div>
                                <span wire:loading.remove wire:target="save">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Guardar Factura
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ... (Footer sin cambios) ... -->
    </div>
</div>

{{-- Tu script existente para el scroll y el mensaje de éxito --}}
{{-- No necesitas el script para cambiar el texto del botón de guardar, Livewire lo maneja con wire:loading --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (tu código de scroll existente) ...

        // Check if success message exists and scroll to top
        const successMessage = document.querySelector('.animate-pulse'); // El de tu mensaje de éxito
        if (successMessage) {
            scrollToTop();
            setTimeout(() => {
                // ... (tu código para ocultar mensaje de éxito) ...
            }, 6000);
        }
    });

    function scrollToTop() {
        // ... (tu función scrollToTop) ...
    }

    document.addEventListener('livewire:load', function() {
        Livewire.hook('message.processed', (message, component) => {
            if (component.fingerprint.name ===
                'invoice-upload-form2') { // Asegúrate que es tu componente
                if (sessionStorage.getItem('invoiceFormSubmittedSuccess')) {
                    scrollToTop();
                    sessionStorage.removeItem('invoiceFormSubmittedSuccess');
                }
            }
        });

        // Si usas el evento 'formSubmitted' para saber cuándo resetear
        Livewire.on('formSubmitted', () => {
            sessionStorage.setItem('invoiceFormSubmittedSuccess', 'true');
            // El reseteo del input file ya está en el x-init
        });
    });

    // Fallback si es necesario (aunque el x-init debería bastar)
    let lastFlashMessage = '';
    setInterval(() => {
        const flashMessage = document.querySelector('.animate-pulse');
        if (flashMessage && flashMessage.textContent !== lastFlashMessage) {
            lastFlashMessage = flashMessage.textContent;
            scrollToTop();
        }
    }, 500);
</script>
