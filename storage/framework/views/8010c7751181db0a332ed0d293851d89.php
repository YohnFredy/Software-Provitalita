<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Show']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Show']); ?>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div
            class="flex flex-col sm:flex-row items-center bg-white rounded-lg py-4 sm:py-8 px-6 sm:px-12 border border-neutral-200 shadow-md mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
            <!-- Paso 1: Recibido -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="<?php echo e($order->status >= 2 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300'); ?> rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="text-sm mt-2">Recibido</p>
            </div>

            <!-- Línea de progreso -->
            <div
                class="w-full sm:w-auto sm:flex-1 h-1 <?php echo e($order->status >= 2 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300'); ?>">
            </div>

            <!-- Paso 2: Enviado -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="<?php echo e($order->status >= 4 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300'); ?> rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <p class="text-sm mt-2">Enviado</p>
            </div>

            <!-- Línea de progreso -->
            <div
                class="w-full sm:w-auto sm:flex-1 h-1 <?php echo e($order->status >= 4 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300'); ?>">
            </div>

            <!-- Paso 3: Entregado -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="<?php echo e($order->status >= 5 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300'); ?> rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="text-sm mt-2">Entregado</p>
            </div>
        </div>


        <!-- Order Reference -->
        <div class="bg-white rounded-lg p-6 border border-neutral-200 shadow-md mb-6 text-center">
            <p class="text-lg font-semibold text-primary uppercase">Referencia:
                <span><?php echo e($order->public_order_number); ?></span>
            </p>
        </div>

        <!-- Shipping and Contact Details -->
        <div class="bg-white rounded-lg p-6 border border-neutral-200 shadow-md mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Shipping Details -->
                <div>
                    <p class="text-lg font-semibold  uppercase mb-4">Detalles de Envío</p>
                    <?php if($order->envio_type == 1): ?>
                        <p class="">Recogida en tienda:</p>
                        <p class="">Calle 15 #42, Cali, Valle del Cauca</p>
                    <?php else: ?>
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
                    <?php endif; ?>
                </div>

                <!-- Contact Details -->
                <div>
                    <p class="text-lg font-semibold text-primary uppercase mb-4">Contacto</p>
                    <p class="">Recibe: <?php echo e($order->contact); ?></p>
                    <p class="">Teléfono: <?php echo e($order->phone); ?></p>
                </div>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="sm:bg-white rounded-lg sm:p-6 sm:border sm:border-neutral-200 sm:shadow-md text-center">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                
                <div class="w-full md:w-1/2 flex justify-center md:justify-start mb-4 md:mb-0">
                    <img src="https://www.agenciatravelfest.com/wp-content/uploads/2022/10/logos-medios-de-pago.jpg"
                        class="w-full h-24 object-contain rounded-md" alt="Métodos de Pago">
                </div>

                
                <div class="w-full md:w-1/2 md:pl-6">
                    <div class="flex justify-between items-center border-t pt-2">
                        <span class="font-semibold">Subtotal productos:</span>
                        <span>$<?php echo e(number_format($order->subtotal, 0)); ?></span>
                    </div>

                    <?php if($order->discount > 0): ?>
                        <div class="flex justify-between items-center border-t pt-2">
                            <span class="font-semibold">Descuento:</span>
                            <span class="text-red-600">- $<?php echo e(number_format($order->discount, 0)); ?></span>
                        </div>

                        <div class="flex justify-between items-center border-t pt-2">
                            <span class="font-semibold">Subtotal descuento:</span>
                            <span>$<?php echo e(number_format($order->subtotal - $order->discount, 0)); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="flex justify-between items-center border-t pt-2">
                        <span class="font-semibold">Subtotal (Sin IVA):</span>
                        <span>$<?php echo e(number_format($order->taxable_amount, 0)); ?></span>
                    </div>
                    <div class="flex justify-between items-center border-t pt-2">
                        <span class="font-semibold">IVA:</span>
                        <span>$<?php echo e(number_format($order->tax_amount, 0)); ?></span>
                    </div>

                    <?php if($order->shipping_cost > 0): ?>
                        <div class="flex justify-between items-center border-t pt-2">
                            <span class="font-semibold">Envío:</span>
                            <span>$<?php echo e(number_format($order->shipping_cost, 0)); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="flex justify-between items-center border-t pt-2">
                        <span class="font-semibold">Total a Pagar:</span>
                        <span class="text-black font-bold text-lg">$<?php echo e(number_format($order->total, 0)); ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm text-primary mt-1 border-t pt-2">
                        <span>Puntos Acumulados:</span>
                        <span><?php echo e($order->total_pts); ?> pts</span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Incluir el archivo JavaScript separado -->
    <script src="<?php echo e(asset('js/boldCheckout.js')); ?>"></script>

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
<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/orders/show.blade.php ENDPATH**/ ?>