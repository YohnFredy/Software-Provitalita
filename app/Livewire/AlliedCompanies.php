<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessData;
use App\Models\Country;
use App\Models\Department;
use Livewire\Component;

class AlliedCompanies extends Component
{
    public $categories = [];
    public $countries = [];
    public $departments = [];
    public $cities = [];

    public $selectedCategory = '';
    public $selectedCountry = '';
    public $selectedDepartment = '';
    public $selectedCity = '';

    public $businesses = [];

    public function mount()
    {
        $this->categories = BusinessCategory::all();
        $this->countries = Country::all();
        $this->loadBusinesses();
    }

    public function updatedSelectedCategory()
    {
        // Solo resetear filtros geográficos si es necesario
        $this->resetGeographicFilters();
        $this->loadBusinesses();
    }

    public function updatedSelectedCountry()
    {
        // Resetear departamentos y ciudades
        $this->reset(['departments', 'selectedDepartment', 'cities', 'selectedCity']);
        
        if ($this->selectedCountry) {
            $this->departments = Department::where('country_id', $this->selectedCountry)->get();
        }
        
        $this->loadBusinesses();
    }

    public function updatedSelectedDepartment()
    {
        // Resetear solo ciudades
        $this->reset(['cities', 'selectedCity']);
        
        if ($this->selectedDepartment) {
            $this->loadCities();
        }
        
        $this->loadBusinesses();
    }

    public function updatedSelectedCity()
    {
        $this->loadBusinesses();
    }

    /**
     * Método principal para cargar businesses con filtros acumulativos
     */
    private function loadBusinesses()
    {
        $query = Business::with(['data', 'categories']);

        // Aplicar filtro de categoría si está seleccionada
        if (!empty($this->selectedCategory)) {
            $query->whereHas('categories', function ($q) {
                $q->where('business_categories.id', $this->selectedCategory);
            });
        }

        // Aplicar filtros geográficos si están seleccionados
        if (!empty($this->selectedCountry) || !empty($this->selectedDepartment) || !empty($this->selectedCity)) {
            $query->whereHas('data', function ($q) {
                $this->applyGeographicFilters($q);
            });
        }

        $this->businesses = $query->get();
    }

    /**
     * Aplicar filtros geográficos de manera acumulativa
     */
    private function applyGeographicFilters($query)
    {
        // Filtro por país
        if (!empty($this->selectedCountry)) {
            $country = Country::find($this->selectedCountry);
            if ($country) {
                $query->where('country', 'like', '%' . $country->name . '%');
            }
        }

        // Filtro por departamento (acumulativo)
        if (!empty($this->selectedDepartment)) {
            $department = Department::find($this->selectedDepartment);
            if ($department) {
                $query->where('department', 'like', '%' . $department->name . '%');
            }
        }

        // Filtro por ciudad (acumulativo)
        if (!empty($this->selectedCity)) {
            $query->where('city', 'like', '%' . $this->selectedCity . '%');
        }
    }

    /**
     * Cargar ciudades que tienen comercios disponibles según los filtros aplicados
     */
    private function loadCities()
    {
        if ($this->selectedDepartment) {
            $department = Department::find($this->selectedDepartment);
            if ($department) {
                // Construir query base para businesses según filtros actuales
                $businessQuery = Business::query();
                
                // Aplicar filtro de categoría si está seleccionada
                if (!empty($this->selectedCategory)) {
                    $businessQuery->whereHas('categories', function ($q) {
                        $q->where('business_categories.id', $this->selectedCategory);
                    });
                }
                
                // Obtener solo las ciudades que tienen comercios con los filtros aplicados
                $this->cities = BusinessData::whereHas('business', function ($q) use ($businessQuery) {
                    $q->whereIn('id', $businessQuery->pluck('id'));
                })
                ->where('department', $department->name)
                ->when(!empty($this->selectedCountry), function ($q) {
                    $country = Country::find($this->selectedCountry);
                    if ($country) {
                        $q->where('country', 'like', '%' . $country->name . '%');
                    }
                })
                ->select('city')
                ->distinct()
                ->whereNotNull('city')
                ->where('city', '!=', '')
                ->orderBy('city')
                ->get()
                ->map(function ($item) {
                    return (object) ['city' => $item->city];
                });
            }
        }
    }
    private function resetGeographicFilters()
    {
        $this->reset(['selectedCountry', 'departments', 'selectedDepartment', 'cities', 'selectedCity']);
        $this->countries = Country::all();
    }

    /**
     * Limpiar todos los filtros
     */
    public function clearFilters()
    {
        $this->reset([
            'selectedCategory', 
            'selectedCountry', 
            'selectedDepartment', 
            'selectedCity',
            'departments',
            'cities'
        ]);
        
        $this->categories = BusinessCategory::all();
        $this->countries = Country::all();
        $this->loadBusinesses();
    }

    public function render()
    {
        return view('livewire.allied-companies');
    }
}