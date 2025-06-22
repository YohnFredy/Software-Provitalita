<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\Merchant;
use App\Models\MerchantBranch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Laravel\Facades\Image as InterventionImage;
use App\Services\DocumentAiService; // Asegúrate que esta ruta sea correcta
use Illuminate\Support\Facades\Log;
use Carbon\Carbon; // Para el manejo de fechas
class InvoiceUploadForm extends Component
{
     use WithFileUploads;

    public $image;
    public $search = '';
    public $matchingMerchants;
    public $selectedMerchant = null;
    public $selectedCity = '';
    public $selectedBranchId = '';

    // Campos que serán poblados por OCR (y editables)
    public $invoice_number_ocr;
    public $total_amount_ocr;
    public $invoice_date_ocr;

    public $merchantCities;
    public $merchantBranches;

    // Estado del OCR
    public $isProcessingOcr = false;
    public $ocrStatusMessage = '';
    public $ocrDataFound = false; // Para saber si el OCR encontró algo útil

    protected $rules = [
        'selectedMerchant' => 'required|exists:merchants,id',
        'selectedCity' => 'required|string',
        'selectedBranchId' => 'required|exists:merchant_branches,id',
        'invoice_number_ocr' => 'required|string|max:255',
        'total_amount_ocr' => 'required|numeric|min:0',
        'invoice_date_ocr' => 'required|date',
        'image' => 'required|image|max:10240', // Max 10MB
    ];

    protected $messages = [
        'selectedMerchant.required' => 'Debe seleccionar un comercio.',
        'selectedCity.required' => 'Debe seleccionar una ciudad.',
        'selectedBranchId.required' => 'Debe seleccionar una dirección/sucursal.',
        'invoice_number_ocr.required' => 'El número de factura es obligatorio.',
        'total_amount_ocr.required' => 'El monto total es obligatorio.',
        'total_amount_ocr.numeric' => 'El monto total debe ser un número.',
        'invoice_date_ocr.required' => 'La fecha de la factura es obligatoria.',
        'invoice_date_ocr.date' => 'La fecha de la factura no es válida.',
        'image.required' => 'Debe seleccionar una imagen para la factura.',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.max' => 'La imagen no debe exceder los 10MB.',
    ];

    protected DocumentAiService $documentAiService;

    public function boot(DocumentAiService $documentAiService)
    {
        $this->documentAiService = $documentAiService;
    }

    public function mount()
    {
        $this->matchingMerchants = collect();
        $this->merchantCities = collect();
        $this->merchantBranches = collect();
    }

    public function updatedSearch()
    {
        $this->resetSelection();
        if (strlen($this->search) < 2) {
            $this->matchingMerchants = collect();
            return;
        }
        $this->matchingMerchants = Merchant::where('identification_number', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function selectMerchant($merchantId)
    {
        $this->selectedMerchant = $merchantId;
        $merchant = Merchant::find($merchantId);
        if (!$merchant) {
            $this->resetSelection();
            return;
        }
        $this->search = "{$merchant->name} ({$merchant->identification_number})";
        $branches = MerchantBranch::where('merchant_id', $merchantId)->get();
        $this->merchantCities = $branches->pluck('city')->unique()->values();
        if ($this->merchantCities->isNotEmpty()) {
            $this->selectedCity = $this->merchantCities->first();
            $this->updateBranches();
        } else {
            $this->selectedCity = '';
            $this->merchantBranches = collect();
            $this->selectedBranchId = '';
        }
        $this->matchingMerchants = collect();
    }

    public function updatedSelectedCity()
    {
        $this->updateBranches();
    }

    public function updateBranches()
    {
        if (!$this->selectedMerchant || !$this->selectedCity) {
            $this->merchantBranches = collect();
            $this->selectedBranchId = '';
            return;
        }
        $branches = MerchantBranch::where('merchant_id', $this->selectedMerchant)
            ->where('city', $this->selectedCity)
            ->get();
        $this->merchantBranches = $branches;
        if ($branches->isNotEmpty()) {
            $this->selectedBranchId = $branches->first()->id;
        } else {
            $this->selectedBranchId = '';
        }
    }

    /**
     * Se dispara cuando la propiedad $image se actualiza (se carga un archivo).
     */
    public function updatedImage()
    {
        $this->validateOnly('image');
        $this->ocrStatusMessage = ''; // Limpiar mensaje anterior
        $this->ocrDataFound = false;
        // Limpiar datos de OCR previos si se sube una nueva imagen
        $this->invoice_number_ocr = null;
        $this->total_amount_ocr = null;
        $this->invoice_date_ocr = null;

        if ($this->image) {
            $this->processImageWithOcr();
        }
    }

    /**
     * Procesa la imagen cargada con el servicio OCR.
     */
    public function processImageWithOcr()
    {
        if (!$this->image) {
            $this->ocrStatusMessage = 'No hay imagen para procesar.';
            return;
        }

        $this->isProcessingOcr = true;
        $this->ocrStatusMessage = 'Procesando imagen con OCR, por favor espere...';
        // $this->dispatch('ocrProcessingStarted'); 

        try {
            $filePath = $this->image->getRealPath();
            $mimeType = $this->image->getMimeType();

            Log::info("Procesando OCR para el archivo: {$filePath}, MIME: {$mimeType}");

            $ocrResponse = $this->documentAiService->processInvoice($filePath, $mimeType);
            
            // --- PUNTO DE DEPURACIÓN ---
            // Vamos a ver qué hay en $ocrResponse ANTES de la validación
            // dd($ocrResponse); 
            // --- FIN PUNTO DE DEPURACIÓN ---

            if (!$ocrResponse || !isset($ocrResponse['entities'])) {
                // Si dd() muestra algo aquí, y aun así entramos en este if,
                // hay que analizar el contenido de $ocrResponse que mostró el dd().
                // Es posible que $ocrResponse no sea null, pero no tenga la clave 'entities',
                // o que $ocrResponse sea false o un array vacío.

                $this->ocrStatusMessage = 'El servicio OCR no devolvió datos válidos o hubo un error.';
                Log::error('Respuesta inválida o nula del servicio OCR.', ['response_received' => $ocrResponse]); // Logueamos lo que se recibió
                $this->isProcessingOcr = false;
                // $this->dispatch('ocrProcessingFinished', ['success' => false]);
                return;
            }

            // ... el resto del método ...

        } catch (\Google\ApiCore\ApiException $e) {
            Log::error("Google API Exception durante OCR: " . $e->getMessage(), [
                'status' => $e->getStatus(),
                'code' => $e->getCode(),
            ]);
            $this->ocrStatusMessage = 'Error de API de Google al procesar la imagen. Intente más tarde o ingrese los datos manualmente.';
            // Si sospechas que el error está aquí, puedes hacer dd($e);
            // dd($e); 
        } catch (\Exception $e) {
            Log::error("Error general durante el procesamiento OCR: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            $this->ocrStatusMessage = 'Error al procesar la imagen con OCR. Por favor, ingrese los datos manualmente.';
            // Si sospechas que el error está aquí, puedes hacer dd($e);
            // dd($e);
        } finally {
            $this->isProcessingOcr = false;
            // $this->dispatch('ocrProcessingFinished', ['success' => $this->ocrDataFound]);
        }
    }


    public function save()
    {
        // Validar los datos, incluyendo los potencialmente poblados por OCR
        $this->validate();

        $branch = MerchantBranch::find($this->selectedBranchId);
        if (
            !$branch ||
            $branch->merchant_id != $this->selectedMerchant ||
            $branch->city != $this->selectedCity
        ) {
            $this->addError('selectedBranchId', 'La ciudad y sucursal no coinciden con el comercio seleccionado.');
            return;
        }

        // El procesamiento de la imagen para guardarla ya está aquí, lo cual es bueno.
        $uploadedFile = $this->image;
        $originalExtension = $uploadedFile->getClientOriginalExtension();
        $filename = Str::random(40) . '.' . $originalExtension;
        $directory = 'invoices/' . now()->format('Y/m/d');
        $storagePath = $directory . '/' . $filename;

        $imageManager = InterventionImage::read($uploadedFile->getRealPath())
            ->scale(width: 720);
        $encodedImage = $imageManager->toWebp(60);

        Storage::disk('public')->put($storagePath, (string) $encodedImage);

        Invoice::create([
            'user_id' => Auth::id(),
            'merchant_branch_id' => $this->selectedBranchId,
            'invoice_number_ocr' => $this->invoice_number_ocr, // Usar el valor de la propiedad
            'total_amount_ocr' => $this->total_amount_ocr,   // Usar el valor de la propiedad
            'invoice_date_ocr' => $this->invoice_date_ocr,   // Usar el valor de la propiedad
            'image_path' => $storagePath,
            'status' => 'pending_review', // O el estado que definas
            // 'raw_ocr_response' => json_encode($this->lastOcrResponse) // Si quieres guardar la respuesta completa
        ]);

        session()->flash('message', 'Factura cargada exitosamente.');
        $this->resetForm();
        // Emitir un evento para que JS pueda limpiar el input de archivo si es necesario
        $this->dispatch('formSubmitted');
    }

    public function resetSelection()
    {
        $this->selectedMerchant = null;
        $this->selectedCity = '';
        $this->selectedBranchId = '';
        $this->merchantCities = collect();
        $this->merchantBranches = collect();
    }

    public function resetForm()
    {
        $this->reset([
            'search',
            'image', // Esto quita la referencia al archivo en Livewire
            'invoice_number_ocr',
            'total_amount_ocr',
            'invoice_date_ocr',
            'isProcessingOcr',
            'ocrStatusMessage',
            'ocrDataFound'
        ]);
        $this->resetSelection();
        $this->matchingMerchants = collect();
        // Es importante que JS también limpie el valor del input file
        $this->dispatch('formReset');
    }


    public function render()
    {
        return view('livewire.office.invoice-upload-form', [
            'cities' => $this->merchantCities,
        ]);
    }
}
