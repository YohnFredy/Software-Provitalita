<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhookController;
use App\Livewire\Order\OrderCreate;
use App\Livewire\Product\Cart;
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
Route::get('carrito', Cart::class)->name('products.cart');

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



    Route::get('order/create', OrderCreate::class)->name('orders.create');

    //Pasarela de pagos Bold
    Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');
    Route::get('orders/bold/respuesta', [OrderController::class, 'boldResponsePayment'])->name('orders.bold');

    //pasarela de pagos Wompi
    Route::get('/checkout/wompi/{order}', [OrderController::class, 'wompiCheckout'])->name('wompi.checkout');
    Route::get('/pagos/respuesta', [PaymentController::class, 'wompiResponse'])->name('wompi.response');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}/show', [OrderController::class, 'show'])->name('orders.show');
});

Route::post('webhook/bold/payment-status', [WebhookController::class, 'handleBoldWebhook']);
Route::post('/webhook/wompi', [WebhookController::class, 'handleWompiWebhook']);

require __DIR__ . '/auth.php';
