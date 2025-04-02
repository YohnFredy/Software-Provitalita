<div class="grid grid-cols-6 gap-6">
    <div class=" col-span-6 md:col-span-4 ">
        <h2 class=" text-primary  border-b sm:border-none border-neutral-400 pb-2 sm:pb-0">Carro (<?php echo e($quantity); ?> productos)
        </h2>
        <div class=" sm:bg-white rounded-md sm:shadow-md shadow-ink sm:border border-neutral-300 sm:p-4 mt-2">
            <div class=" grid grid-cols-12 gap-2 mt-2">
                <!--[if BLOCK]><![endif]--><?php if($products): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-span-3 lg:col-span-1 flex items-center justify-center">
                            <img class=" w-16 h-16 rounded-md border border-neutral-300"
                                src="<?php echo e(asset('storage/' . $product['path'])); ?>" alt="<?php echo e($product['name']); ?>">
                        </div>
                        <div class="col-span-9 lg:col-span-5 flex items-center">
                            <div class=" text-sm text-primary">
                                <p class=" font-bold">
                                    <?php echo e($product['name']); ?>

                                </p>
                                <p class="mt-2 text-justify  line-clamp-3 text-ink">
                                    <?php echo Str::limit($product['description'], 50); ?></p>
                            </div>
                        </div>

                        <div class="col-span-4 lg:col-span-2 flex items-center justify-center">
                            <div class="text-sm">
                                <p class=" text-primary">
                                    $<?php echo e(number_format($product['price'], 0)); ?>

                                </p>

                              
                            </div>
                        </div>

                        <div class="col-span-7 lg:col-span-3 flex items-center justify-center">
                            <div>
                                <button wire:click="decrement(<?php echo e($product['index']); ?>)"
                                    class="bg-primary  py-1 px-3 rounded-md hover:bg-secondary  text-neutral-200 hover:text-white ">-</button>
                                <input type="text"
                                    class="text-center p-0 w-10 border-none focus:outline-none focus:ring-0 focus:border-none focus:shadow-none "
                                    wire:model.live="products.<?php echo e($product['index']); ?>.quantity"
                                    value="<?php echo e($product['quantity']); ?>">
                                <button wire:click="increment(<?php echo e($product['index']); ?>)"
                                    class="bg-primary  py-1 px-3 rounded-md hover:bg-secondary  text-neutral-200 hover:text-white ">+</button>
                            </div>
                        </div>

                        <div wire:click="removeFromCart(<?php echo e($product['index']); ?>)"
                            class="col-span-1 lg:col-span-1 flex items-center justify-center cursor-pointer text-danger hover:text-danger/80">
                            <i class="  text-lg fas fa-trash"></i>
                        </div>

                        <div class="col-span-12">
                            <div class=" my-2 border-b border-neutral-400">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <?php else: ?>
                    <div class=" col-span-12  flex items-center justify-center">

                        <p class=" py-4 text-lg font-bold">No hay productos en el carro</p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <div class="col-span-6 md:col-span-2">
        <h2 class=" text-primary">Resumen de la orden</h2>
        <div class=" bg-white  rounded-md shadow-md shadow-ink border border-neutral-300 p-2  sm:p-4 mt-2">
            <ul class="divide-y divide-neutral-300">
                <li class=" flex justify-between py-2">
                    <p>Productos (<?php echo e($quantity); ?>)
                    </p>
                    <p> $<?php echo e(number_format($total, 0)); ?></p>
                </li>

                <li class=" flex justify-between py-2">
                    <p>Subtotal:
                    </p>
                    <p> $<?php echo e(number_format($total, 0)); ?></p>
                </li>
            </ul>

            <div class=" flex justify-center mt-6">
                <!--[if BLOCK]><![endif]--><?php if($quantity < 1): ?>
                    <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['variant' => 'primary','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary','disabled' => true]); ?>Continuar compra  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('orders.create')); ?>">
                        <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary']); ?>Continuar compra <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $attributes = $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580)): ?>
<?php $component = $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580; ?>
<?php unset($__componentOriginalc04b147acd0e65cc1a77f86fb0e81580); ?>
<?php endif; ?>
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/livewire/product/cart.blade.php ENDPATH**/ ?>