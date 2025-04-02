<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class=" space-y-4">
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <h1 class="text-xl sm:text-2xl font-bold text-primary mb-2">Detalles de Pago</h1>
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm sm:text-base font-semibold text-primary uppercase">Referencia:</span>
                <span class="text-sm sm:text-base text-secondary font-bold"><?php echo e($order->public_order_number); ?></span>
            </div>
        </div>

        <!-- Shipping and Contact Details -->
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Shipping Details -->
                <div class="space-y-3">
                    <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="16" height="13" x="4" y="7" rx="2" />
                            <path d="M18 7V5a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v2" />
                            <path d="M8 12h8" />
                            <path d="M8 16h8" />
                        </svg>
                        Detalles de Envío
                    </h2>
                    <div class="bg-neutral-50 p-3 rounded-md text-sm sm:text-base">
                        <?php if($order->envio_type == 1): ?>
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mt-0.5 flex-shrink-0 text-primary" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 3v18h18" />
                                    <path d="M7 14v3" />
                                    <path d="M11 9v8" />
                                    <path d="M15 14v3" />
                                    <path d="M19 15v2" />
                                </svg>
                                <div>
                                    <p class="font-medium">Recogida en tienda:</p>
                                    <p class="text-neutral-600">Calle 15 #42, Cali, Valle del Cauca</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mt-0.5 flex-shrink-0 text-primary" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <div>
                                    <p class="font-medium">Dirección:</p>
                                    <p class="text-neutral-600"><?php echo e($order->address); ?> - <?php echo e($order->additional_address); ?>

                                    </p>
                                    <p class="text-neutral-600"><?php echo e($order->country->name); ?> -
                                        <?php echo e($order->department->name); ?> -
                                        <?php if(!$order->city_id == null): ?>
                                            <?php echo e($order->city->name); ?>

                                        <?php else: ?>
                                            <?php echo e($order->addCity); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="space-y-3">
                    <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Contacto
                    </h2>
                    <div class="bg-neutral-50 p-3 rounded-md text-sm sm:text-base">
                        <div class="flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            <span class="font-medium">Recibe:</span>
                            <span class="text-neutral-600"><?php echo e($order->contact); ?></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span class="font-medium">Teléfono:</span>
                            <span class="text-neutral-600"><?php echo e($order->phone); ?></span>
                        </div>
                    </div>
                </div>

                
                <div class="bg-secondary/5 border border-secondary/30 rounded-lg p-3 sm:p-5">
                    <h3 class="font-semibold text-danger mb-2">Información importante sobre el envío</h3>

                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>El costo del envío se pagará contra entrega directamente al repartidor.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Solo necesitas pagar ahora el valor del producto a través de nuestra pasarela
                                segura.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Para cualquier consulta, escríbenos a <span
                                    class="font-medium">info@fornuvi.com</span></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <line x1="2" x2="22" y1="10" y2="10" />
                </svg>
                Resumen de Pedido
            </h2>
            <div class="overflow-x-auto -mx-4 sm:mx-0 rounded-lg border border-neutral-200">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-600">
                    <thead class="text-xs bg-primary text-white uppercase">

                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3">Producto</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Cant</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Prec. Unit.</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Pts. Unit.</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-neutral-200 hover:bg-neutral-50">
                                <th scope="row"
                                    class="flex items-center px-4 sm:px-6 py-3 font-medium text-neutral-900 whitespace-nowrap">
                                    <?php if($item->product->latestImage): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->product->latestImage->path)); ?>"
                                            alt="<?php echo e($item->product->name); ?>"
                                            class="w-10 h-10 rounded-md object-cover">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/default.png')); ?>"
                                            alt="<?php echo e($item->product->name); ?>"
                                            class="w-10 h-10 rounded-md object-cover">
                                    <?php endif; ?>
                                    <div class="ps-3 max-w-[180px] sm:max-w-none">
                                        <div class="text-xs sm:text-sm font-semibold truncate"><?php echo e($item->name); ?>

                                        </div>
                                    </div>
                                </th>
                                <td class="px-2 sm:px-6 py-3 text-center"><?php echo e($item->quantity); ?></td>
                                <td class="px-2 sm:px-6 py-3 text-center">$<?php echo e(number_format($item->price, 0)); ?></td>
                                <td class="px-2 sm:px-6 py-3 text-center"><?php echo e(number_format($item->pts, 2)); ?></td>
                                <td class="px-2 sm:px-6 py-3 text-center">$<?php echo e(number_format($item->subtotal, 0)); ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class=" sm:flex justify-end">
                <div class="mt-4 sm:w-1/2">
                    <div class="flex justify-between items-center border-t pt-2">
                        <span class="font-semibold">Subtotal:</span>
                        <span>$<?php echo e(number_format($subtotal, 0)); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Descuento:</span>
                        <span class="text-danger">- $<?php echo e(number_format($order->discount, 0)); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center text-lg font-semibold mt-2">
                        <span>Total a Pagar:</span>
                        <span class=" font-normal">$<?php echo e(number_format($order->total, 0)); ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm text-primary mt-1">
                        <span>Puntos Acumulados:</span>
                        <span><?php echo e($order->total_pts); ?> pts</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Payment Methods -->
            <div class="bg-white rounded-lg p-5 sm:p-6 shadow-md border border-neutral-200">
                <h2 class="text-lg sm:text-xl font-semibold text-primary uppercase mb-4">Métodos de Pago</h2>

                <div class="space-y-5">
                    <!-- Transferencia Bancaria -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-2">Pago por Transferencia
                            Bancaria</h3>
                        <p class="text-neutral-600 text-sm sm:text-base leading-relaxed">
                            La orden ha sido generada exitosamente.

                            Si prefieres realizar el pago mediante transferencia bancaria en lugar de utilizar nuestra
                            pasarela de pagos, puedes hacerlo a través de Bancolombia, Nequi, Daviplata u otros medios
                            disponibles. Para continuar con el proceso, simplemente contáctanos a través de WhatsApp al
                            <strong class="underline whitespace-nowrap">(+57) 314 520-78-14</strong> y te
                            proporcionaremos los detalles necesarios para completar tu pago.
                        </p>
                    </div>

                    <!-- Pasarela de Pago -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-2">Pago con Pasarela Bold</h3>
                        <p class="text-neutral-600 text-sm sm:text-base leading-relaxed">
                            Haga clic en el botón a continuación para proceder con el pago a través de nuestra pasarela
                            segura.
                        </p>
                        <div class="mt-4">
                            <!-- Botón personalizado -->
                            <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['variant' => 'primary','id' => 'custom-button-payment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','id' => 'custom-button-payment']); ?>
                                🔒 Pago 100% seguro con Bold
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const initBoldCheckout = () => {
                if (document.querySelector(
                        'script[src="https://checkout.bold.co/library/boldPaymentButton.js"]')) {
                    console.warn('Bold Checkout script is already loaded.');
                    return;
                }

                const js = document.createElement('script');
                js.src = 'https://checkout.bold.co/library/boldPaymentButton.js';
                js.onload = () => {
                    window.dispatchEvent(new Event('boldCheckoutLoaded'));
                };
                js.onerror = () => {
                    console.error("Error al cargar el script de Bold.");
                };
                document.head.appendChild(js);
            };

            // Inicializar Bold Checkout al cargar la página
            initBoldCheckout();

            // Esperar a que Bold se cargue
            window.addEventListener('boldCheckoutLoaded', function() {
                console.log("Bold Checkout cargado correctamente.");

                const checkout = new BoldCheckout({
                    orderId: "<?php echo e($boldCheckoutConfig['orderId']); ?>",
                    currency: "<?php echo e($boldCheckoutConfig['currency']); ?>",
                    amount: "<?php echo e($boldCheckoutConfig['amount']); ?>",
                    apiKey: "<?php echo e($boldCheckoutConfig['apiKey']); ?>",
                    integritySignature: "<?php echo e($boldCheckoutConfig['integritySignature']); ?>",
                    description: "<?php echo e($boldCheckoutConfig['description']); ?>",
                    redirectionUrl: "<?php echo e($boldCheckoutConfig['redirectionUrl']); ?>",
                    expirationDate: "<?php echo e($boldCheckoutConfig['expiration-date']); ?>",
                });

                const customButton = document.getElementById('custom-button-payment');
                if (customButton) {
                    customButton.addEventListener('click', function() {
                        checkout.open();
                    });
                }
            });
        });
    </script>



    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/orders/checkout-bold.blade.php ENDPATH**/ ?>