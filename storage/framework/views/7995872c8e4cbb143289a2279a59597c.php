<?php
$classes = Flux::classes()
    ->add('[:where(&)]:min-w-48 p-[.3125rem]')
    ->add('rounded-lg shadow-xs')
    ->add('border border-zinc-200')
    ->add('bg-white')
    ->add('focus:outline-hidden')
    ;
?>

<ui-menu
    <?php echo e($attributes->class($classes)); ?>

    popover="manual"
    data-flux-menu
>
    <?php echo e($slot); ?>

</ui-menu>
<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/flux/menu/index.blade.php ENDPATH**/ ?>