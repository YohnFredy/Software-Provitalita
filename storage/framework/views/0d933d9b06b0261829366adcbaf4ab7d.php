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
            isLoaded: false,
            retryCount: 0,
            maxRetries: 10, // Aumentado para dispositivos móviles más lentos

            get showZoomInButton() {
                return this.currentZoom < 1.0;
            },

            init() {
                // Detectar si es un dispositivo móvil
                const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

                // Para dispositivos móviles, esperamos un poco más antes del primer intento
                if (isMobile) {
                    setTimeout(() => {
                        this.checkAndInitialize();
                    }, 500);
                } else {
                    this.$nextTick(() => {
                        this.checkAndInitialize();
                    });
                }

                // También intentar cuando la ventana esté completamente cargada
                window.addEventListener('load', () => {
                    this.checkAndInitialize();
                });

                // Recalcular cuando cambie la orientación de la pantalla (importante para móviles)
                window.addEventListener('orientationchange', () => {
                    setTimeout(() => {
                        this.recalculate();
                    }, 300);
                });

                // Recalcular también al redimensionar la ventana
                window.addEventListener('resize', this.debounce(() => {
                    this.recalculate();
                }, 250));

                // Forzar una recarga después de un tiempo más largo como último recurso
                setTimeout(() => {
                    if (!this.isLoaded) {
                        this.forceInitialize();
                    }
                }, 3000);
            },

            // Función para limitar la frecuencia de ejecución (debounce)
            debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        func.apply(context, args);
                    }, wait);
                };
            },

            checkAndInitialize() {
                const treeContent = this.$refs.treeContainer;

                if (treeContent && treeContent.offsetHeight > 20) {
                    // El contenido tiene altura, podemos inicializar
                    this.initialHeight = treeContent.offsetHeight;
                    this.updateContainerHeight();
                    this.isLoaded = true;
                } else if (this.retryCount < this.maxRetries) {
                    // Aún no está listo, intentar de nuevo con tiempo incremental
                    this.retryCount++;

                    // Para dispositivos móviles, incrementamos más el tiempo de espera
                    const delayTime = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent) ?
                        400 * this.retryCount :
                        300 * this.retryCount;

                    setTimeout(() => {
                        this.checkAndInitialize();
                    }, delayTime);
                } else {
                    // Último recurso: forzar la inicialización
                    this.forceInitialize();
                }
            },

            forceInitialize() {
                const treeContent = this.$refs.treeContainer;

                // Primero intentamos obtener la altura real
                if (treeContent) {
                    // Aseguramos que sea visible temporalmente para medir
                    const originalDisplay = treeContent.style.display;
                    treeContent.style.display = 'block';

                    // Medimos después de un pequeño retraso
                    setTimeout(() => {
                        const height = treeContent.scrollHeight || treeContent.offsetHeight;

                        if (height > 50) {
                            this.initialHeight = height;
                        } else {
                            // Si aún no podemos obtener la altura, usar un valor predeterminado adaptativo
                            const windowHeight = window.innerHeight;
                            this.initialHeight = Math.max(500, windowHeight * 0.7);
                        }

                        this.updateContainerHeight();
                        this.isLoaded = true;

                        // Restaurar display original
                        treeContent.style.display = originalDisplay;
                    }, 50);
                } else {
                    // Valor predeterminado si no hay referencia al contenedor
                    this.initialHeight = 500;
                    this.updateContainerHeight();
                    this.isLoaded = true;
                }
            },

            recalculate() {
                if (this.isLoaded) {
                    const treeContent = this.$refs.treeContainer;
                    if (treeContent) {
                        // Restablecer el zoom para medir correctamente
                        const originalZoom = this.currentZoom;
                        this.currentZoom = 1.0;

                        // Aplicar inmediatamente para que la medición sea correcta
                        treeContent.style.transform = 'scale(1, 1)';

                        // Esperar un momento y luego medir
                        setTimeout(() => {
                            this.initialHeight = treeContent.offsetHeight;
                            this.currentZoom = originalZoom;
                            this.updateContainerHeight();
                        }, 50);
                    }
                }
            },

            initializeTreeHeight() {
                const treeContent = this.$refs.treeContainer;
                if (treeContent) {
                    this.initialHeight = treeContent.offsetHeight;
                    this.updateContainerHeight();
                    this.isLoaded = true;
                }
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
                // Actualizar la altura del contenedor basada en el contenido escalado
                const treeContent = this.$refs.treeContainer;
                if (treeContent && this.initialHeight > 0) {
                    const scaledHeight = this.initialHeight * this.currentZoom;
                    if (scaledHeight > 0) {
                        this.containerHeight = scaledHeight;
                    }
                }
            }
        }));
    });
</script>


<?php echo app('flux')->fluxAppearance(); ?>

<?php /**PATH C:\Users\Fredy\Herd\fornuvi\resources\views/partials/head.blade.php ENDPATH**/ ?>