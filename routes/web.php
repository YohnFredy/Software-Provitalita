<?php


use App\Http\Controllers\ContactController;
use App\Livewire\Product\ProductListing;
use App\Livewire\Product\ProductShow;
use App\Livewire\Prueba;
use App\Livewire\ShowProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/productos', ProductListing::class)->name('products.index');
Route::get('producto/{product}', ProductShow::class)->name('products.show');

Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('prueba', Prueba::class)->name('prueba');

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); */

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
