<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard']); ?>

    <?php if(session('success')): ?>
        <div class="bg-premium/5 border-l-4 border-premium text-premium p-4 mb-6 rounded shadow-md" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-premim" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">
                        <strong>¡Mensaje enviado con éxito!</strong>
                    </p>
                    <p class="text-sm mt-1"><?php echo e(session('success')); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <section id="inicio" class="p-6 sm:p-10 bg-gradient-to-r from-primary to-secondary text-white rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-x-8 ">
            <div class=" space-y-6 sm:space-y-8 text-center">
                <h1 class="text-3xl md:text-4xl font-bold leading-tight">Transforma tu futuro financiero con
                    ActivosNetwork
                </h1>
                <p class="text-lg md:text-2xl font-light">Una compañía en el sector de salud y bienestar que ofrece
                    múltiples oportunidades financieras a través de un sistema global de asociación.</p>

                <div class="sm:pt-4 flex flex-col sm:flex-row justify-center sm:justify-start gap-4">
                    <a href="#franquicias"
                        class="inline-block px-6 py-3 bg-white text-primary rounded-md font-medium text-center hover:bg-neutral-100 transition duration-150">Nuestras
                        Franquicias
                    </a>
                    <a href="#contacto"
                        class="inline-block px-6 py-3 border-2 border-white text-white rounded-md font-medium text-center hover:bg-white hover:text-primary transition duration-150">Comienza
                        Hoy</a>
                </div>
            </div>
            <div class="hidden md:block">
                <img src="https://images.pexels.com/photos/7792804/pexels-photo-7792804.jpeg"
                    alt="ActivosNetwork Oportunidades" class="rounded-lg shadow-lg shadow-ink">
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="nosotros" class="py-8 md:py-16 md:px-10 sm:bg-neutral-50 ">
        <div class="text-center mb-6 sm:mb-10 ">
            <h2 class="text-2xl sm:text-4xl font-bold text-primary">Nuestra Historia</h2>
            <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 md:gap-x-10 gap-y-6 md:gap-y-10 items-center">
            <div>
                <img src="https://thefoodtech.com/wp-content/uploads/2025/02/vibrant-health-nutritional-power-pill.webp"
                    alt="ActivosNetwork Historia" class="rounded-lg shadow-lg shadow-ink">
            </div>
            <div class="">
                <div class="flex items-start">
                    <div class="bg-primary rounded-full text-white mr-3 flex-shrink-0">
                        <div class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center"><i
                                class="fas fa-history text-lg md:text-xl"></i></div>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl font-semibold text-primary mb-1 md:mb-2">18 años de
                            experiencia</h3>
                        <p class="text-ink text-sm md:text-base">ActivosNetwork se ha enfocado en el desarrollo de
                            complementos
                            nutricionales y nutraceúticos, respaldados por años de investigación y desarrollo.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-primary rounded-full text-white mr-3 flex-shrink-0">
                        <div class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center"><i
                                class="fas fa-globe-americas text-lg md:text-xl"></i></div>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl font-semibold text-primary mb-1 md:mb-2">Presencia
                            internacional</h3>
                        <p class="text-ink text-sm md:text-base">Contamos con 8 años de investigación en sistemas de
                            mercadeo en red
                            desarrollados en India, Estados Unidos y países latinos.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-primary rounded-full text-white mr-3 flex-shrink-0">
                        <div class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center">
                            <i class="fas fa-lightbulb text-lg md:text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl font-semibold text-primary mb-1 md:mb-2">Propuesta innovadora
                        </h3>
                        <p class="text-ink text-sm md:text-base">ActivosNetwork es una propuesta especialmente
                            adaptada para el mercado
                            latinoamericano, enfocada en apalancamiento, inversiones tangibles, sinergia y un nivel
                            comercial competitivo.</p>
                    </div>
                </div>
                <div class="mt-6 md:mt-8">
                    <h3 class="text-lg md:text-xl font-bold text-primary mb-3 md:mb-4">Nuestros objetivos</h3>
                    <ul class="space-y-2 md:space-y-3">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-primary text-sm md:text-base">Entregar un sistema que permita el
                                desarrollo de redes
                                sólidas, altamente eficientes, rápidas y seguras.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-primary text-sm md:text-base">Reunir inversionistas para establecer
                                unidades productivas
                                de bajo riesgo y alta rentabilidad.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-primary text-sm md:text-base">Llevar a sus asociados a alcanzar
                                grandes metas con poca
                                inversión.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehículos Financieros (Franquicias) -->
    <section id="franquicias" class="pt-4 sm:pb-8 md:px-10 sm:bg-neutral-50 rounded-b-lg">
        <div class="text-center mb-6 md:mb-10">
            <h2 class="text-2xl md:text-4xl font-bold text-primary">Nuestros Vehículos Financieros</h2>
            <p class="mt-3 md:mt-4 text-lg md:text-xl text-secondary">Franquicias que impactan en el ámbito
                deportivo, recreativo y
                saludable</p>
            <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- ActivosNetwork Coffee -->
            <div
                class="bg-white rounded-xl shadow-md shadow-ink overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                <div class="relative">
                    <img src="https://thefoodtech.com/wp-content/uploads/2024/08/bebidas-con-cafeina-1.webp"
                        alt="ActivosNetwork Coffee" class="w-full h-48 md:h-64 object-cover">
                    <div class="absolute top-0 left-0 bg-primary text-white py-1 md:py-2 px-3 md:px-4 rounded-br-xl">
                        <i class="fas fa-coffee mr-1 md:mr-2"></i> <span class="text-sm md:text-base">Cafetería</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 md:mb-3">ActivosNetwork Coffee</h3>
                    <p class="text-ink text-sm md:text-base mb-3 md:mb-4">Una cafetería especializada en bebidas
                        que combinan sabor y
                        bienestar. Aquí, cada taza de café está diseñada para revitalizar cuerpo y mente,
                        convirtiéndose en un punto de encuentro ideal.</p>
                    <a href="#contacto"
                        class="inline-block mt-1 md:mt-2 text-secondary text-sm md:text-base font-medium hover:text-primary">
                        Conoce más <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Chelas -->
            <div
                class="bg-white rounded-xl shadow-md shadow-ink overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                <div class="relative">
                    <img src="https://i.pinimg.com/474x/74/e4/d9/74e4d91ad64ae9276bdcbcc7fa7657cd.jpg" alt="Chelas"
                        class="w-full h-48 md:h-64 object-cover">
                    <div class="absolute top-0 left-0 bg-primary text-white py-1 md:py-2 px-3 md:px-4 rounded-br-xl">
                        <i class="fas fa-cocktail mr-1 md:mr-2"></i> <span class="text-sm md:text-base">Bar</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 md:mb-3">Chelas</h3>
                    <p class="text-ink text-sm md:text-base mb-3 md:mb-4">Un lugar innovador donde las micheladas y
                        las bebidas especiales
                        se mezclan con un concepto de experiencia surrealista y recreativa. Este bar busca
                        convertirse en un referente para el entretenimiento.</p>
                    <a href="#contacto"
                        class="inline-block mt-1 md:mt-2 text-secondary text-sm md:text-base font-medium hover:text-primary">
                        Conoce más <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- ActivosNetwork -->
            <div
                class="bg-white rounded-xl shadow-md shadow-ink overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                <div class="relative">
                    <img src="<?php echo e(asset('storage/images/tienda_naturista.jpeg')); ?>" alt="ActivosNetwork"
                        class="w-full h-48 md:h-64 object-cover">
                    <div class="absolute top-0 left-0 bg-primary text-white py-1 md:py-2 px-3 md:px-4 rounded-br-xl">
                        <i class="fas fa-leaf mr-1 md:mr-2"></i> <span class="text-sm md:text-base">Tienda
                            Naturista</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 md:mb-3">ActivosNetwork</h3>
                    <p class="text-ink text-sm md:text-base mb-3 md:mb-4">Un espacio dedicado a la salud natural,
                        ofreciendo suplementos,
                        productos orgánicos y alimentos funcionales. ActivosNetwork fomenta un enfoque integral de
                        bienestar físico y mental.</p>
                    <a href="#contacto"
                        class="inline-block mt-1 md:mt-2 text-secondary text-sm md:text-base font-medium hover:text-primary">
                        Conoce más <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Maspro -->
            <div
                class="bg-white rounded-xl shadow-md shadow-ink overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                <div class="relative">
                    <img src="<?php echo e(asset('storage/images/mas_pro.jpeg')); ?>" alt="Maspro"
                        class="w-full h-48 md:h-64 object-cover">
                    <div class="absolute top-0 left-0 bg-primary text-white py-1 md:py-2 px-3 md:px-4 rounded-br-xl">
                        <i class="fas fa-dumbbell mr-1 md:mr-2"></i> <span class="text-sm md:text-base">Tienda
                            Deportiva</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 md:mb-3">Maspro</h3>
                    <p class="text-ink text-sm md:text-base mb-3 md:mb-4">Una tienda enfocada en ofrecer
                        suplementos, ropa, accesorios y
                        asesoría de alta calidad para el desempeño óptimo de deportistas de todos los niveles.</p>
                    <a href="#contacto"
                        class="inline-block mt-1 md:mt-2 text-secondary text-sm md:text-base font-medium hover:text-premium">
                        Conoce más <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Net Inmobiliario -->
            <div
                class="bg-white rounded-xl shadow-md shadow-ink overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2 md:col-span-2 lg:col-span-1">
                <div class="relative">
                    <img src="https://arriendosyventasibague.com/public/img/temas/negocio-inmobiliario.jpg"
                        alt="Net Inmobiliario" class="w-full h-48 md:h-64 object-cover">
                    <div class="absolute top-0 left-0 bg-primary text-white py-1 md:py-2 px-3 md:px-4 rounded-br-xl">
                        <i class="fas fa-home mr-1 md:mr-2"></i> <span
                            class="text-sm md:text-base">Inmobiliaria</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 md:mb-3">Net Inmobiliario</h3>
                    <p class="text-ink text-sm md:text-base mb-3 md:mb-4">Conjuga todas las modalidades
                        inmobiliarias, brindando token
                        inmobiliarios, tiempos compartidos, compra y venta de propiedad raíz y construcción y
                        remodelación de vivienda nueva y usada.</p>
                    <a href="#contacto"
                        class="inline-block mt-1 md:mt-2 text-secondary text-sm md:text-base font-medium hover:text-primary">
                        Conoce más <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <!-- Modelos de Inversión -->
    <section id="inversion" class="mt-12 sm:mt-16 sm:px-10 bg-white">
        <div class="text-center mb-6">
            <h2 class="text-3xl md:text-4xl font-bold text-primary">Modelos de Inversión</h2>
            <p class="mt-4 text-xl text-secondary">Alternativas adaptadas a tus objetivos financieros</p>
            <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10 mb-6 sm:mb-10">
            <div
                class="bg-white p-4 sm:p-8 rounded-xl border border-neutral-200 shadow-md shadow-ink hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="bg-premium p-3 rounded-lg text-white mr-4">
                        <i class="fas fa-chart-pie text-2xl"></i>
                    </div>
                    <h3 class=" text-xl sm:text-2xl font-bold text-primary">Franquicia API</h3>
                </div>
                <p class="text-ink mb-6">La modalidad API permite al inversionista adquirir una fracción de la
                    franquicia en porcentaje de utilidades, ideal para quienes buscan iniciar con una inversión
                    menor.</p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Inversión inicial más accesible</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Participación en porcentaje de utilidades</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Menor riesgo y responsabilidad operativa</span>
                    </li>
                </ul>
                <a href="#contacto"
                    class="inline-flex items-center justify-center w-full px-6 py-3 mt-2 bg-primary text-white rounded-md hover:bg-secondary transition duration-300">
                    Más información
                </a>
            </div>

            <div
                class="bg-white p-4 sm:p-8 rounded-xl border border-gray-200 shadow-md shadow-ink hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="bg-premium p-3 rounded-lg text-white mr-4">
                        <i class="fas fa-store text-2xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-primary">Franquicia de Operación</h3>
                </div>
                <p class="text-ink mb-6">Esta modalidad permite al inversionista adquirir la franquicia como
                    persona natural o bajo el marco de cualquier tipo de sociedad, con control total sobre la
                    operación.</p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Control total de la operación</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Mayor potencial de rentabilidad</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-primary mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-primary">Respaldo completo de la marca</span>
                    </li>
                </ul>
                <a href="#contacto"
                    class="inline-flex items-center justify-center w-full px-6 py-3 mt-2 bg-primary text-white rounded-md hover:bg-secondary transition duration-300">
                    Más información
                </a>
            </div>
        </div>

        <div class="bg-neutral-50 rounded-2xl p-4 sm:p-6 md:p-10 shadow-md shadow-ink border border-neutral-200">
            <h3 class="text-xl sm:text-2xl font-bold text-primary text-center mb-4 sm:mb-6">Otras formas de inversión
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
                <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                    <div class="bg-premium p-3 rounded-full text-white mb-3 sm:mb-0 sm:mr-4 flex-shrink-0">
                        <i class="fas fa-project-diagram text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-medium text-primary mb-2">Inversión en proyectos avalados
                        </h4>
                        <p class="text-ink text-sm sm:text-base">Participa en proyectos específicos respaldados por la
                            compañía,
                            con diferentes niveles de inversión y retorno.</p>
                    </div>
                </div>
                <div
                    class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left mt-4 sm:mt-0">
                    <div class="bg-premium p-3 rounded-full text-white mb-3 sm:mb-0 sm:mr-4 flex-shrink-0">
                        <i class="fas fa-box-open text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-medium text-primary mb-2">Distribución de productos</h4>
                        <p class="text-ink text-sm sm:text-base">Conviértete en distribuidor de productos de las
                            distintas marcas
                            afiliadas y propias de la compañía.</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 sm:mt-8 text-center">
                <a href="#contacto"
                    class="inline-block w-full sm:w-auto px-6 sm:px-8 py-3 bg-primary text-white text-sm sm:text-base rounded-md hover:bg-secondary transition duration-300">
                    Descubre más oportunidades
                </a>
            </div>
        </div>
    </section>

    <!-- Por qué ActivosNetwork -->
    <section id="diferencias"
        class="p-4 sm:p-10 mt-10 sm:mt-16 rounded-xl bg-gradient-to-r from-primary to-secondary text-white">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-4xl font-bold">¿Por qué elegir ActivosNetwork?</h2>
            <p class="mt-4 text-lg  sm:text-xl">Diferencias con respecto al mercadeo en red tradicional</p>
            <div class="h-1 w-24 bg-white mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div
                class="bg-white/20 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                <div
                    class="rounded-full bg-white text-secondary w-16 h-16 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-box-open text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Amplia gama de productos</h3>
                <p class="text-center">Ofrecemos una variedad de productos con precios competitivos que se adaptan
                    a las necesidades del mercado actual.</p>
            </div>

            <div
                class="bg-white/20 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                <div
                    class="rounded-full bg-white text-secondary w-16 h-16 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-store-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Puntos físicos de apoyo</h3>
                <p class="text-center">Contamos con establecimientos físicos que apalancarán tus ingresos y te
                    brindarán una ventaja competitiva real.</p>
            </div>

            <div
                class="bg-white/20 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                <div
                    class="rounded-full bg-white text-secondary w-16 h-16 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Mercado más amplio</h3>
                <p class="text-center">No te limites a tu lista de contactos. ActivosNetwork te abre las puertas a
                    un
                    mercado mucho más amplio y diversificado.</p>
            </div>

            <div
                class="bg-white/20 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                <div
                    class="rounded-full bg-white text-secondary w-16 h-16 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-hand-holding-usd text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Respeto a tu inversión</h3>
                <p class="text-center">ActivosNetwork respeta la inversión individual, de esta manera tus ingresos
                    no solo
                    dependen de la red de distribución.</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="#contacto"
                class="inline-block px-8 py-4 bg-white text-primary rounded-md font-medium text-lg hover:bg-neutral-200 transition duration-300">
                Únete a ActivosNetwork hoy
            </a>
        </div>

    </section>

    <!-- Testimonios -->
    

    <!-- Contacto -->
    <section id="contacto" class=" mt-10 ">
        <div class="text-center sm:p-8">
            <h2 class="text-2xl md:text-4xl font-bold text-primary">Comienza tu camino con ActivosNetwork</h2>
            <p class="mt-4 text-xl text-secondary">Estamos listos para responder todas tus preguntas</p>
            <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 py-4 sm:px-10 ">
            <div class="bg-white rounded-xl shadow-md shadow-ink p-4 sm:p-8">
                <h3 class="text-2xl font-bold text-primary mb-6">Contáctanos</h3>

                <?php if($errors->any()): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">¡Error!</strong>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form id="demo-form" action="<?php echo e(route('contacto.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-2 gap-x-3">
                        <div class="col-span-2 sm:col-span-1">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'nombre','name' => 'nombre','label' => 'Nombre completo:','for' => 'nombre','placeholder' => 'Nombre completo','value' => ''.e(old('nombre')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'nombre','name' => 'nombre','label' => 'Nombre completo:','for' => 'nombre','placeholder' => 'Nombre completo','value' => ''.e(old('nombre')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'email','name' => 'email','label' => 'Correo electrónico:','type' => 'email','for' => 'email','placeholder' => 'Ingrese el Correo electrónico','value' => ''.e(old('email')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','name' => 'email','label' => 'Correo electrónico:','type' => 'email','for' => 'email','placeholder' => 'Ingrese el Correo electrónico','value' => ''.e(old('email')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'telefono','name' => 'telefono','label' => 'Teléfono:','type' => 'tel','for' => 'telefono','placeholder' => 'Ingrese el teléfono','value' => ''.e(old('telefono')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'telefono','name' => 'telefono','label' => 'Teléfono:','type' => 'tel','for' => 'telefono','placeholder' => 'Ingrese el teléfono','value' => ''.e(old('telefono')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <div class="mb-5">
                                <label for="interes" class="block mb-2 text-sm font-medium text-primary">Me
                                    interesa:</label>
                                <div class="relative">
                                    <select id="interes" name="interes" required
                                        class="block w-full bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                                        <option value="" <?php echo e(old('interes') ? '' : 'selected'); ?>>Seleccionar
                                            opción</option>
                                        <option value="ActivosNetwork_coffee"
                                            <?php echo e(old('interes') == 'ActivosNetwork_coffee' ? 'selected' : ''); ?>>
                                            ActivosNetwork
                                            Coffee</option>
                                        <option value="chelas" <?php echo e(old('interes') == 'chelas' ? 'selected' : ''); ?>>
                                            Chelas
                                        </option>
                                        <option value="ActivosNetwork"
                                            <?php echo e(old('interes') == 'ActivosNetwork' ? 'selected' : ''); ?>>ActivosNetwork
                                        </option>
                                        <option value="maspro" <?php echo e(old('interes') == 'maspro' ? 'selected' : ''); ?>>
                                            Maspro
                                        </option>
                                        <option value="net_inmobiliario"
                                            <?php echo e(old('interes') == 'net_inmobiliario' ? 'selected' : ''); ?>>Net
                                            Inmobiliario
                                        </option>
                                        <option value="distribucion"
                                            <?php echo e(old('interes') == 'distribucion' ? 'selected' : ''); ?>>
                                            Distribución de
                                            productos</option>
                                        <option value="informacion"
                                            <?php echo e(old('interes') == 'informacion' ? 'selected' : ''); ?>>
                                            Información general
                                        </option>
                                    </select>
                                    <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['interes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-sm text-danger"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div class="mb-5">
                                <label for="mensaje"
                                    class="block mb-2 text-sm font-medium text-primary">Mensaje:</label>
                                <textarea id="mensaje" name="mensaje" rows="6" required
                                    class="block w-full bg-neutral-50/50 border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5"><?php echo e(old('mensaje')); ?></textarea>
                                <?php $__errorArgs = ['mensaje'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-sm text-danger"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc04b147acd0e65cc1a77f86fb0e81580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04b147acd0e65cc1a77f86fb0e81580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::button.index','data' => ['type' => 'submit','variant' => 'primary','class' => 'g-recaptcha w-full','dataSitekey' => ''.e(config('services.recaptcha.key')).'','dataCallback' => 'onSubmit','dataAction' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary','class' => 'g-recaptcha w-full','data-sitekey' => ''.e(config('services.recaptcha.key')).'','data-callback' => 'onSubmit','data-action' => 'submit']); ?>
                        Enviar mensaje
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
                </form>
            </div>

            <div class="bg-primary text-white rounded-xl shadow-md shadow-ink">
                <div class="p-4 sm:p-6 md:p-8">
                    <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center sm:text-left">Información de
                        contacto</h3>
                    <div class="space-y-4 sm:space-y-6">
                        
                        <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                            <div class="bg-white rounded-full text-primary mb-2 sm:mb-0 sm:mr-4">
                                <div class="w-10 h-10 flex items-center justify-center">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-base sm:text-lg font-medium mb-1">Teléfono</h4>
                                <p class="text-sm sm:text-base">+57 (318) 813-2381</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                            <div class="bg-white rounded-full text-primary mb-2 sm:mb-0 sm:mr-4">
                                <div class="w-10 h-10 flex items-center justify-center">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-base sm:text-lg font-medium mb-1">Correo electrónico</h4>
                                <p class="text-sm sm:text-base">info@activosnetwork.com</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                            <div class="bg-white rounded-full text-primary mb-2 sm:mb-0 sm:mr-4">
                                <div class="w-10 h-10 flex items-center justify-center">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-base sm:text-lg font-medium mb-1">Horario de atención</h4>
                                <p class="text-sm sm:text-base">Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                                <p class="text-sm sm:text-base">Sábados: 9:00 AM - 1:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 sm:mt-8">
                        <h4 class="text-base sm:text-lg font-medium mb-3 sm:mb-4 text-center sm:text-left">Síguenos en
                            redes sociales</h4>
                        <div class="flex justify-center sm:justify-start space-x-3 sm:space-x-4">
                            <a href="#"
                                class="bg-white text-primary p-2 sm:p-3 rounded-full hover:bg-neutral-200 transition duration-300">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center">
                                    <i class="fab fa-facebook-f text-sm sm:text-base"></i>
                                </div>
                            </a>
                            <a href="#"
                                class="bg-white text-primary p-2 sm:p-3 rounded-full hover:bg-neutral-200 transition duration-300">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center">
                                    <i class="fab fa-instagram text-sm sm:text-base"></i>
                                </div>
                            </a>
                            <a href="#"
                                class="bg-white text-primary p-2 sm:p-3 rounded-full hover:bg-neutral-200 transition duration-300">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center">
                                    <i class="fab fa-twitter text-sm sm:text-base"></i>
                                </div>
                            </a>
                            <a href="#"
                                class="bg-white text-primary p-2 sm:p-3 rounded-full hover:bg-neutral-200 transition duration-300">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center">
                                    <i class="fab fa-linkedin-in text-sm sm:text-base"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- CTA -->
    <section class="mt-6 sm:mt-10 p-4 sm:p-10 bg-primary text-white rounded-xl">
        <div class="text-center">
            <h2 class="text-2xl md:text-4xl font-bold mb-4">¿Listo para transformar tu futuro financiero?</h2>
            <p class="text-lg md:text-xl mb-8">Únete a ActivosNetwork y descubre un nuevo camino hacia la libertad
                financiera
                y el
                bienestar.</p>
            <a href="#contacto"
                class="inline-block px-8 py-4 bg-white text-primary rounded-md font-medium text-lg hover:bg-neutral-200 transition duration-300">
                Comienza hoy mismo
            </a>
        </div>
    </section>

    <!-- Back to top button -->
    <button id="backToTop"
        class="fixed cursor-pointer bottom-6 right-6 bg-secondary text-white w-12 h-12 rounded-full flex items-center justify-center shadow-md shadow-ink  hover:bg-primary transition duration-300"
        onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </button>

    <?php $__env->startPush('js'); ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <script>
            function onSubmit(token) {
                document.getElementById("demo-form").submit();
            }
        </script>
    <?php $__env->stopPush(); ?> 

    <script>
        // Mostrar/ocultar botón de volver arriba
        window.addEventListener('scroll', function() {
            var backToTopButton = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        // Iniciar con el botón oculto
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('backToTop').style.display = 'none';
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
<?php /**PATH C:\Users\Fredy\Herd\activosnetwork\resources\views/index.blade.php ENDPATH**/ ?>