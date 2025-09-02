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
use Intervention\Image\Format;
use Intervention\Image\Laravel\Facades\Image as InterventionImage;

class InvoiceUploadForm2 extends Component
{
    use WithFileUploads;

    public $image;
    public $search = '';
    public $matchingMerchants;
    public $selectedMerchant = null;
    public $selectedCity = '';
    public $selectedBranchId = '';

    public $invoice_number_ocr;
    public $total_amount_ocr;
    public $invoice_date_ocr;

    public $merchantCities;
    public $merchantBranches;

    protected $rules = [
        'selectedMerchant' => 'required|exists:merchants,id',
        'selectedCity' => 'required|string',
        'selectedBranchId' => 'required|exists:merchant_branches,id',
        'invoice_number_ocr' => 'required|string|max:255',
        'total_amount_ocr' => 'required|numeric|min:0',
        'invoice_date_ocr' => 'required|date',
        'image' => 'required|image|max:10240',
    ];

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

    public function save()
    {
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
            'invoice_number_ocr' => $this->invoice_number_ocr,
            'total_amount_ocr' => $this->total_amount_ocr,
            'invoice_date_ocr' => $this->invoice_date_ocr,
            'image_path' => $storagePath,
            'status' => 'pending_review',
        ]);

        session()->flash('message', 'Factura cargada exitosamente.');
        $this->resetForm();
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
            'image',
            'invoice_number_ocr',
            'total_amount_ocr',
            'invoice_date_ocr',
        ]);
        $this->resetSelection();
        $this->matchingMerchants = collect();
    }

    public function render()
    {
        return view('livewire.invoice-upload-form2', [
            'cities' => $this->merchantCities,
        ]);
    }
}
