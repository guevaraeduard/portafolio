<template>
    <section id="sobre-mi"
        class="w-full px-4 sm:px-6 md:px-16 py-12 md:py-16 bg-[#181818] flex flex-col md:flex-row items-center gap-10 md:gap-12">
        <div class="flex-1 flex justify-center mb-8 md:mb-0">
            <div
                class="relative flex items-end justify-center w-60 h-80 xs:w-72 xs:h-96 sm:w-80 sm:h-[28rem] md:w-[28rem] md:h-[34rem]">
                <div
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 w-60 h-60 xs:w-72 xs:h-72 sm:w-80 sm:h-80 md:w-[28rem] md:h-[28rem] rounded-full bg-[#232323] z-0">
                </div>
                <img src="assets/images/photo.png" alt="Eduard Guevara"
                    class="relative z-10 grayscale w-56 xs:w-64 sm:w-72 md:w-80 lg:w-[22rem] xl:w-[24rem] h-auto drop-shadow-2xl"
                    style="object-fit: contain; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);">
            </div>
        </div>
        <div class="flex-1 flex flex-col gap-4 text-center md:text-left items-center md:items-start">
            <h2 class="text-2xl md:text-3xl font-bold mb-2">Sobre Mí</h2>
            <span class="text-sm text-gray-400 mb-2">Desarrollador Web & Mobile | UI/UX | Freelancer</span>
            <p class="text-gray-300 text-sm md:text-base mb-4">Soy un apasionado desarrollador web y móvil con más de 3
                años de experiencia creando soluciones digitales a medida. Me especializo en el desarrollo de interfaces
                modernas, optimizadas y accesibles, utilizando tecnologías como Vue.js, Laravel, Inertia, Tailwind CSS,
                Ionic y Flutter. Disfruto colaborar con equipos multidisciplinarios y transformar ideas en productos
                funcionales que generan impacto real. Siempre busco aprender nuevas herramientas y tendencias para
                ofrecer lo mejor a mis clientes.</p>
            <a href="#portafolio"
                class="px-6 py-2 bg-[#ff8000] text-white rounded-md font-semibold hover:bg-[#ff9900] transition w-max">SABER
                MÁS</a>
        </div>
    </section>
</template>