<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php echo e($title ?? 'fornuvi'); ?></title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

<?php echo $__env->yieldPushContent('css'); ?>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<?php echo $__env->yieldPushContent('js'); ?>

<!-- Script de Alpine para el control del árbol -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('treeZoom', () => ({
            currentZoom: 1.0,
            zoomStep: 0.1,
            minZoom: 0.2,
            initialHeight: 0,
            containerHeight: 'auto',

            // Propiedad calculada para determinar si el botón de aumentar zoom debe mostrarse
            get showZoomInButton() {
                return this.currentZoom < 1.0;
            },

            init() {
                // Capturar altura inicial del contenido real
                this.$nextTick(() => {
                    const treeContent = this.$refs.treeContainer;
                    if (treeContent) {
                        this.initialHeight = treeContent.offsetHeight;
                        this.updateContainerHeight();
                    }
                });
            },

            decreaseZoom() {
                if (this.currentZoom > this.minZoom) {
                    this.currentZoom = parseFloat((this.currentZoom - this.zoomStep).toFixed(1));
                    this.updateContainerHeight();
                }
            },

            increaseZoom() {
                if (this.currentZoom < 1.0) {
                    this.currentZoom = parseFloat((this.currentZoom + this.zoomStep).toFixed(1));
                    this.updateContainerHeight();
                }
            },

            resetZoom() {
                this.currentZoom = 1.0;
                this.updateContainerHeight();
            },

            updateContainerHeight() {
                this.$nextTick(() => {
                    // Actualizar la altura del contenedor basada en el contenido escalado
                    const scaledHeight = this.initialHeight * this.currentZoom;
                    if (scaledHeight > 0) {
                        this.containerHeight = scaledHeight;
                    }
                });
            }
        }));
    });
</script>


<?php echo app('flux')->fluxAppearance(); ?>

<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/partials/head.blade.php ENDPATH**/ ?>