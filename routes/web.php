<?php

use App\Http\Controllers\ProductController;
use App\Livewire\Office\BinaryTree;
use App\Livewire\Office\Dashboard;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('index');
})->name('home');




Route::get('/productos', [ProductController::class, 'index'])->name('products.index');



Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{slug}', [ProductController::class, 'show'])->name('products.show');

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); */

Route::middleware(['auth'])->group(function () {


    Route::get('dashboard', Dashboard::class)->name('dashboard');

    
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('binary/tree', BinaryTree::class)->name('binary-tree');
});

require __DIR__.'/auth.php';
