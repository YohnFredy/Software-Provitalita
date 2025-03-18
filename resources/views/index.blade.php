<x-layouts.app title="Dashboard">

    @if (session('success'))
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
                    <p class="text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

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
                <img src="https://adrnetworks.mx/wp-content/uploads/2024/03/Ahorro-1024x576.png"
                    alt="ActivosNetwork Oportunidades" class="rounded-lg shadow-lg shadow-ink">
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="nosotros" class="py-8 md:py-16 md:px-10 sm:bg-neutral-100 ">
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
    <section id="franquicias" class="pt-4 sm:pb-8 md:px-10 sm:bg-gray-100 rounded-b-lg">
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
                    <img src="{{ asset('storage/images/tienda_naturista.jpeg') }}" alt="ActivosNetwork"
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
                    <img src="{{ asset('storage/images/mas_pro.jpeg') }}" alt="Maspro"
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
    {{-- <section class=" py-10 sm:py-16 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-primary">Lo que dicen nuestros asociados</h2>
                <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-neutral-50 p-8 rounded-xl shadow-md shadow-ink">
                    <div class="flex items-center mb-4">
                        <img src="https://st2.depositphotos.com/1518767/6556/i/450/depositphotos_65561731-stock-photo-smiling-businessman-well-dressed.jpg"
                            alt="Testimonio 1" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-primary">Carlos Rodríguez</h4>
                            <p class="text-secondary">Franquiciado ActivosNetwork Coffee</p>
                        </div>
                    </div>
                    <p class="text-ink italic">"Desde que me uní a ActivosNetwork, mi vida financiera cambió
                        completamente. La franquicia de ActivosNetwork Coffee no solo me ha dado estabilidad económica,
                        sino
                        también la oportunidad de crear un espacio donde las personas disfrutan de momentos especiales."
                    </p>
                    <div class="mt-4 flex text-premium">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="bg-neutral-50 p-8 rounded-xl shadow-md shadow-ink">
                    <div class="flex items-center mb-4">
                        <img src="https://b2472105.smushcdn.com/2472105/wp-content/uploads/2024/02/Fotografia-de-Retrato-29-1170x1170.jpg?lossy=1&strip=1&webp=1"
                            alt="Testimonio 2" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-primary">María Gómez</h4>
                            <p class="text-secondary">Inversora en ActivosNetwork</p>
                        </div>
                    </div>
                    <p class="text-ink italic">"Lo que más me gusta de ActivosNetwork es su enfoque en el bienestar. Mi
                        inversión en ActivosNetwork no solo ha sido rentable, sino que me ha permitido contribuir a la
                        salud de muchas personas. El sistema de acompañamiento es excepcional."</p>
                    <div class="mt-4 flex text-premium">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="bg-neutral-50 p-8 rounded-xl shadow-md shadow-ink">
                    <div class="flex items-center mb-4">
                        <img src="https://img.freepik.com/fotos-premium/selfie-facial-sonrisa-hombre-negocios-persona-que-toma-foto-memoria-feliz-carrera-redes-sociales-foto-perfil-retrato-empresario-profesional-o-asiatico-singapur-cargo_590464-183436.jpg"
                            alt="Testimonio 3" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-primary">Jorge Méndez</h4>
                            <p class="text-secondary">Distribuidor independiente</p>
                        </div>
                    </div>
                    <p class="text-ink italic">"Empecé como distribuidor de productos y ahora tengo mi propia
                        franquicia API. La diferencia con otros sistemas de mercadeo es notable. Aquí realmente valoran
                        tu inversión y te dan herramientas reales para crecer."</p>
                    <div class="mt-4 flex text-premium">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Contacto -->
    <section id="contacto" class=" mt-10 sm:bg-neutral-50 rounded-lg">
        <div class="text-center sm:p-8">
            <h2 class="text-2xl md:text-4xl font-bold text-primary">Comienza tu camino con ActivosNetwork</h2>
            <p class="mt-4 text-xl text-secondary">Estamos listos para responder todas tus preguntas</p>
            <div class="h-1 w-24 bg-premium mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 py-4 sm:px-10 ">
            <div class="bg-white rounded-xl shadow-md shadow-ink p-4 sm:p-8">
                <h3 class="text-2xl font-bold text-primary mb-6">Contáctanos</h3>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">¡Error!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contacto.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-x-3">
                        <div class="col-span-2 sm:col-span-1">
                            <x-input id="nombre" name="nombre" label="Nombre completo:" for="nombre"
                                placeholder="Nombre completo" value="{{ old('nombre') }}" required />
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <x-input id="email" name="email" label="Correo electrónico:" type="email"
                                for="email" placeholder="Ingrese el Correo electrónico"
                                value="{{ old('email') }}" required />
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <x-input id="telefono" name="telefono" label="Teléfono:" type="tel" for="telefono"
                                placeholder="Ingrese el teléfono" value="{{ old('telefono') }}" required />
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <div class="mb-5">
                                <label for="interes" class="block mb-2 text-sm font-medium text-primary">Me
                                    interesa:</label>
                                <div class="relative">
                                    <select id="interes" name="interes" required
                                        class="block w-full bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                                        <option value="" {{ old('interes') ? '' : 'selected' }}>Seleccionar
                                            opción</option>
                                        <option value="ActivosNetwork_coffee"
                                            {{ old('interes') == 'ActivosNetwork_coffee' ? 'selected' : '' }}>
                                            ActivosNetwork
                                            Coffee</option>
                                        <option value="chelas" {{ old('interes') == 'chelas' ? 'selected' : '' }}>
                                            Chelas
                                        </option>
                                        <option value="ActivosNetwork"
                                            {{ old('interes') == 'ActivosNetwork' ? 'selected' : '' }}>ActivosNetwork
                                        </option>
                                        <option value="maspro" {{ old('interes') == 'maspro' ? 'selected' : '' }}>
                                            Maspro
                                        </option>
                                        <option value="net_inmobiliario"
                                            {{ old('interes') == 'net_inmobiliario' ? 'selected' : '' }}>Net
                                            Inmobiliario
                                        </option>
                                        <option value="distribucion"
                                            {{ old('interes') == 'distribucion' ? 'selected' : '' }}>
                                            Distribución de
                                            productos</option>
                                        <option value="informacion"
                                            {{ old('interes') == 'informacion' ? 'selected' : '' }}>
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
                                @error('interes')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div class="mb-5">
                                <label for="mensaje"
                                    class="block mb-2 text-sm font-medium text-primary">Mensaje:</label>
                                <textarea id="mensaje" name="mensaje" rows="6" required
                                    class="block w-full bg-neutral-50/50 border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5">{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <flux:button type="submit" variant="primary" class="w-full">
                        Enviar mensaje
                    </flux:button>
                </form>
            </div>

            <div class="bg-primary text-white rounded-xl shadow-md shadow-ink">
                <div class="p-4 sm:p-6 md:p-8">
                    <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center sm:text-left">Información de
                        contacto</h3>
                    <div class="space-y-4 sm:space-y-6">
                        {{-- <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                            <div class="bg-white rounded-full text-primary mb-2 sm:mb-0 sm:mr-4">
                                <div class="w-10 h-10 flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-base sm:text-lg font-medium mb-1">Dirección</h4>
                                <p class="text-sm sm:text-base">Av. Principal #123, Ciudad Capital</p>
                            </div>
                        </div> --}}
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
                                <p class="text-sm sm:text-base">inf@activosnetwork.com</p>
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
</x-layouts.app>
