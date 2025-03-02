<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network - Oportunidades Financieras en Salud y Bienestar</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navbar -->
  

    <!-- Hero Section -->
    <section id="inicio" class="pt-28 pb-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Transforma tu futuro financiero con Network</h1>
                    <p class="text-xl md:text-2xl font-light">Una compañía en el sector de salud y bienestar que ofrece múltiples oportunidades financieras a través de un sistema global de asociación.</p>
                    <div class="pt-6 flex flex-col sm:flex-row gap-4">
                        <a href="#franquicias" class="inline-block px-6 py-3 bg-white text-blue-700 rounded-md font-medium text-center hover:bg-gray-100 transition duration-150">Nuestras Franquicias</a>
                        <a href="#contacto" class="inline-block px-6 py-3 border-2 border-white text-white rounded-md font-medium text-center hover:bg-white hover:text-blue-700 transition duration-150">Comienza Hoy</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="/api/placeholder/600/400" alt="Network Oportunidades" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="nosotros" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Nuestra Historia</h2>
                <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="/api/placeholder/600/500" alt="Network Historia" class="rounded-lg shadow-lg">
                </div>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-blue-600 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-history text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">18 años de experiencia</h3>
                            <p class="text-gray-600">Network se ha enfocado en el desarrollo de complementos nutricionales y nutraceúticos, respaldados por años de investigación y desarrollo.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-600 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-globe-americas text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Presencia internacional</h3>
                            <p class="text-gray-600">Contamos con 8 años de investigación en sistemas de mercadeo en red desarrollados en India, Estados Unidos y países latinos.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-600 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Propuesta innovadora</h3>
                            <p class="text-gray-600">Network es una propuesta especialmente adaptada para el mercado latinoamericano, enfocada en apalancamiento, inversiones tangibles, sinergia y un nivel comercial competitivo.</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Nuestros objetivos</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-600">Entregar un sistema que permita el desarrollo de redes sólidas, altamente eficientes, rápidas y seguras.</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-600">Reunir inversionistas para establecer unidades productivas de bajo riesgo y alta rentabilidad.</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-600">Llevar a sus asociados a alcanzar grandes metas con poca inversión.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehículos Financieros (Franquicias) -->
    <section id="franquicias" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Nuestros Vehículos Financieros</h2>
                <p class="mt-4 text-xl text-gray-600">Franquicias que impactan en el ámbito deportivo, recreativo y saludable</p>
                <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Network Coffee -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Network Coffee" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-blue-600 text-white py-2 px-4 rounded-br-xl">
                            <i class="fas fa-coffee mr-2"></i> Cafetería
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Network Coffee</h3>
                        <p class="text-gray-600 mb-4">Una cafetería especializada en bebidas que combinan sabor y bienestar. Aquí, cada taza de café está diseñada para revitalizar cuerpo y mente, convirtiéndose en un punto de encuentro ideal.</p>
                        <a href="#contacto" class="inline-block mt-2 text-blue-600 font-medium hover:text-blue-800">
                            Conoce más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Chelas -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Chelas" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-blue-600 text-white py-2 px-4 rounded-br-xl">
                            <i class="fas fa-cocktail mr-2"></i> Bar
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Chelas</h3>
                        <p class="text-gray-600 mb-4">Un lugar innovador donde las micheladas y las bebidas especiales se mezclan con un concepto de experiencia surrealista y recreativa. Este bar busca convertirse en un referente para el entretenimiento.</p>
                        <a href="#contacto" class="inline-block mt-2 text-blue-600 font-medium hover:text-blue-800">
                            Conoce más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Provitalita -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Provitalita" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-blue-600 text-white py-2 px-4 rounded-br-xl">
                            <i class="fas fa-leaf mr-2"></i> Tienda Naturista
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Provitalita</h3>
                        <p class="text-gray-600 mb-4">Un espacio dedicado a la salud natural, ofreciendo suplementos, productos orgánicos y alimentos funcionales. Provitalita fomenta un enfoque integral de bienestar físico y mental.</p>
                        <a href="#contacto" class="inline-block mt-2 text-blue-600 font-medium hover:text-blue-800">
                            Conoce más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Maspro -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Maspro" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-blue-600 text-white py-2 px-4 rounded-br-xl">
                            <i class="fas fa-dumbbell mr-2"></i> Tienda Deportiva
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Maspro</h3>
                        <p class="text-gray-600 mb-4">Una tienda enfocada en ofrecer suplementos, ropa, accesorios y asesoría de alta calidad para el desempeño óptimo de deportistas de todos los niveles.</p>
                        <a href="#contacto" class="inline-block mt-2 text-blue-600 font-medium hover:text-blue-800">
                            Conoce más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Net Inmobiliario -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2 md:col-span-2 lg:col-span-1">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Net Inmobiliario" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-blue-600 text-white py-2 px-4 rounded-br-xl">
                            <i class="fas fa-home mr-2"></i> Inmobiliaria
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Net Inmobiliario</h3>
                        <p class="text-gray-600 mb-4">Conjuga todas las modalidades inmobiliarias, brindando token inmobiliarios, tiempos compartidos, compra y venta de propiedad raíz y construcción y remodelación de vivienda nueva y usada.</p>
                        <a href="#contacto" class="inline-block mt-2 text-blue-600 font-medium hover:text-blue-800">
                            Conoce más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modelos de Inversión -->
    <section id="inversion" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Modelos de Inversión</h2>
                <p class="mt-4 text-xl text-gray-600">Alternativas adaptadas a tus objetivos financieros</p>
                <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
                <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-600 p-3 rounded-lg text-white mr-4">
                            <i class="fas fa-chart-pie text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Franquicia API</h3>
                    </div>
                    <p class="text-gray-600 mb-6">La modalidad API permite al inversionista adquirir una fracción de la franquicia en porcentaje de utilidades, ideal para quienes buscan iniciar con una inversión menor.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Inversión inicial más accesible</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Participación en porcentaje de utilidades</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Menor riesgo y responsabilidad operativa</span>
                        </li>
                    </ul>
                    <a href="#contacto" class="inline-flex items-center justify-center w-full px-6 py-3 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                        Más información
                    </a>
                </div>

                <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-600 p-3 rounded-lg text-white mr-4">
                            <i class="fas fa-store text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Franquicia de Operación</h3>
                    </div>
                    <p class="text-gray-600 mb-6">Esta modalidad permite al inversionista adquirir la franquicia como persona natural o bajo el marco de cualquier tipo de sociedad, con control total sobre la operación.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Control total de la operación</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Mayor potencial de rentabilidad</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-blue-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Respaldo completo de la marca</span>
                        </li>
                    </ul>
                    <a href="#contacto" class="inline-flex items-center justify-center w-full px-6 py-3 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                        Más información
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 rounded-2xl p-8 md:p-12 shadow-lg border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Otras formas de inversión</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex items-start">
                        <div class="bg-blue-600 p-3 rounded-full text-white mr-4 flex-shrink-0">
                            <i class="fas fa-project-diagram text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-medium text-gray-900 mb-2">Inversión en proyectos avalados</h4>
                            <p class="text-gray-600">Participa en proyectos específicos respaldados por la compañía, con diferentes niveles de inversión y retorno.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-600 p-3 rounded-full text-white mr-4 flex-shrink-0">
                            <i class="fas fa-box-open text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-medium text-gray-900 mb-2">Distribución de productos</h4>
                            <p class="text-gray-600">Conviértete en distribuidor de productos de las distintas marcas afiliadas y propias de la compañía.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <a href="#contacto" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                        Descubre más oportunidades
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Por qué Network -->
    <section id="diferencias" class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold">¿Por qué elegir Network?</h2>



                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold">¿Por qué elegir Network?</h2>
                    <p class="mt-4 text-xl">Diferencias con respecto al mercadeo en red tradicional</p>
                    <div class="h-1 w-24 bg-white mx-auto mt-4"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                        <div class="rounded-full bg-white text-blue-600 w-16 h-16 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-box-open text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Amplia gama de productos</h3>
                        <p class="text-center">Ofrecemos una variedad de productos con precios competitivos que se adaptan a las necesidades del mercado actual.</p>
                    </div>
                
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                        <div class="rounded-full bg-white text-blue-600 w-16 h-16 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-store-alt text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Puntos físicos de apoyo</h3>
                        <p class="text-center">Contamos con establecimientos físicos que apalancarán tus ingresos y te brindarán una ventaja competitiva real.</p>
                    </div>
                
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                        <div class="rounded-full bg-white text-blue-600 w-16 h-16 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Mercado más amplio</h3>
                        <p class="text-center">No te limites a tu lista de contactos. Network te abre las puertas a un mercado mucho más amplio y diversificado.</p>
                    </div>
                
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 shadow-lg">
                        <div class="rounded-full bg-white text-blue-600 w-16 h-16 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hand-holding-usd text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Respeto a tu inversión</h3>
                        <p class="text-center">Network respeta la inversión individual, de esta manera tus ingresos no solo dependen de la red de distribución.</p>
                    </div>
                </div>
                
                <div class="mt-16 text-center">
                    <a href="#contacto" class="inline-block px-8 py-4 bg-white text-blue-700 rounded-md font-medium text-lg hover:bg-gray-100 transition duration-300">
                        Únete a Network hoy
                    </a>
                </div>
                </div>
                </section>
                
                <!-- Testimonios -->
                <section class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Lo que dicen nuestros asociados</h2>
                        <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
                    </div>
                
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                            <div class="flex items-center mb-4">
                                <img src="/api/placeholder/80/80" alt="Testimonio 1" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Carlos Rodríguez</h4>
                                    <p class="text-blue-600">Franquiciado Network Coffee</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Desde que me uní a Network, mi vida financiera cambió completamente. La franquicia de Network Coffee no solo me ha dado estabilidad económica, sino también la oportunidad de crear un espacio donde las personas disfrutan de momentos especiales."</p>
                            <div class="mt-4 flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                
                        <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                            <div class="flex items-center mb-4">
                                <img src="/api/placeholder/80/80" alt="Testimonio 2" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">María Gómez</h4>
                                    <p class="text-blue-600">Inversora en Provitalita</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Lo que más me gusta de Network es su enfoque en el bienestar. Mi inversión en Provitalita no solo ha sido rentable, sino que me ha permitido contribuir a la salud de muchas personas. El sistema de acompañamiento es excepcional."</p>
                            <div class="mt-4 flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                
                        <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                            <div class="flex items-center mb-4">
                                <img src="/api/placeholder/80/80" alt="Testimonio 3" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Jorge Méndez</h4>
                                    <p class="text-blue-600">Distribuidor independiente</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Empecé como distribuidor de productos y ahora tengo mi propia franquicia API. La diferencia con otros sistemas de mercadeo es notable. Aquí realmente valoran tu inversión y te dan herramientas reales para crecer."</p>
                            <div class="mt-4 flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                
                <!-- Contacto -->
                <section id="contacto" class="py-20 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Comienza tu camino con Network</h2>
                        <p class="mt-4 text-xl text-gray-600">Estamos listos para responder todas tus preguntas</p>
                        <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
                    </div>
                
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Contáctanos</h3>
                            <form>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
                                        <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                        <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="interes" class="block text-sm font-medium text-gray-700 mb-1">Me interesa</label>
                                        <select id="interes" name="interes" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Seleccionar opción</option>
                                            <option value="network_coffee">Network Coffee</option>
                                            <option value="chelas">Chelas</option>
                                            <option value="provitalita">Provitalita</option>
                                            <option value="maspro">Maspro</option>
                                            <option value="net_inmobiliario">Net Inmobiliario</option>
                                            <option value="distribucion">Distribución de productos</option>
                                            <option value="informacion">Información general</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                                    <textarea id="mensaje" name="mensaje" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition duration-300 font-medium">
                                    Enviar mensaje
                                </button>
                            </form>
                        </div>
                
                        <div class="bg-blue-600 text-white rounded-xl shadow-lg overflow-hidden">
                            <div class="p-8">
                                <h3 class="text-2xl font-bold mb-6">Información de contacto</h3>
                                <div class="space-y-6">
                                    <div class="flex items-start">
                                        <div class="bg-white text-blue-600 p-3 rounded-full mr-4 flex-shrink-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-medium mb-1">Dirección</h4>
                                            <p>Av. Principal #123, Ciudad Capital</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="bg-white text-blue-600 p-3 rounded-full mr-4 flex-shrink-0">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-medium mb-1">Teléfono</h4>
                                            <p>+1 (555) 123-4567</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="bg-white text-blue-600 p-3 rounded-full mr-4 flex-shrink-0">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-medium mb-1">Correo electrónico</h4>
                                            <p>info@networkcompany.com</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="bg-white text-blue-600 p-3 rounded-full mr-4 flex-shrink-0">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-medium mb-1">Horario de atención</h4>
                                            <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                                            <p>Sábados: 9:00 AM - 1:00 PM</p>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="mt-8">
                                    <h4 class="text-lg font-medium mb-4">Síguenos en redes sociales</h4>
                                    <div class="flex space-x-4">
                                        <a href="#" class="bg-white text-blue-600 p-3 rounded-full hover:bg-gray-100 transition duration-300">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="bg-white text-blue-600 p-3 rounded-full hover:bg-gray-100 transition duration-300">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#" class="bg-white text-blue-600 p-3 rounded-full hover:bg-gray-100 transition duration-300">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="bg-white text-blue-600 p-3 rounded-full hover:bg-gray-100 transition duration-300">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full h-64 bg-gray-300">
                                <!-- Aquí iría un mapa real -->
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <span class="text-gray-500">Mapa de ubicación</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                
                <!-- CTA -->
                <section class="py-16 bg-blue-800 text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Listo para transformar tu futuro financiero?</h2>
                        <p class="text-xl mb-8">Únete a Network y descubre un nuevo camino hacia la libertad financiera y el bienestar.</p>
                        <a href="#contacto" class="inline-block px-8 py-4 bg-white text-blue-700 rounded-md font-medium text-lg hover:bg-gray-100 transition duration-300">
                            Comienza hoy mismo
                        </a>
                    </div>
                </div>
                </section>
                
                <!-- Footer -->
                <footer class="bg-gray-900 text-white pt-16 pb-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                        <div>
                            <img class="h-12 w-auto mb-6" src="/api/placeholder/200/80" alt="Network Logo">
                            <p class="text-gray-400 mb-6">Una compañía en el sector de salud y bienestar que ofrece múltiples oportunidades financieras a través de un sistema global de asociación.</p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-6">Vehículos Financieros</h3>
                            <ul class="space-y-3">
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Network Coffee</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Chelas</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Provitalita</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Maspro</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Net Inmobiliario</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-6">Enlaces rápidos</h3>
                            <ul class="space-y-3">
                                <li><a href="#inicio" class="text-gray-400 hover:text-white transition duration-300">Inicio</a></li>
                                <li><a href="#nosotros" class="text-gray-400 hover:text-white transition duration-300">Nosotros</a></li>
                                <li><a href="#franquicias" class="text-gray-400 hover:text-white transition duration-300">Vehículos Financieros</a></li>
                                <li><a href="#inversion" class="text-gray-400 hover:text-white transition duration-300">Modelos de Inversión</a></li>
                                <li><a href="#diferencias" class="text-gray-400 hover:text-white transition duration-300">¿Por qué Network?</a></li>
                                <li><a href="#contacto" class="text-gray-400 hover:text-white transition duration-300">Contacto</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-6">Contacto</h3>
                            <ul class="space-y-3 text-gray-400">
                                <li class="flex items-start">
                                    <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                                    <span>Av. Principal #123, Ciudad Capital</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-phone-alt mt-1 mr-3"></i>
                                    <span>+1 (555) 123-4567</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-envelope mt-1 mr-3"></i>
                                    <span>info@networkcompany.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-gray-800 pt-8">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2025 Network. Todos los derechos reservados.</p>
                            <div class="flex space-x-6">
                                <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Términos y condiciones</a>
                                <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Política de privacidad</a>
                                <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Aviso legal</a>
                            </div>
                        </div>
                    </div>
                </div>
                </footer>
                
                <!-- Back to top button -->
                <button id="backToTop" class="fixed bottom-6 right-6 bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition duration-300" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
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
                </body>
                </html>