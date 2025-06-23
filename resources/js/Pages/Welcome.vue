<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Experiencias from '@/Pages/Partials/Experiencias.vue';
import SobreMi from '@/Pages/Partials/SobreMi.vue';
import Skills from '@/Pages/Partials/Skills.vue';
import Portafolio from '@/Pages/Partials/Portafolio.vue';
import Contacto from '@/Pages/Partials/Contacto.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    portfolios: {
        type: Array,
        default: () => []
    }
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <GuestLayout>

        <Head title="Welcome" />
        <!-- Hero -->
        <section
            class="w-full flex flex-col md:flex-row items-center justify-between px-4 sm:px-6 md:px-16 py-10 md:py-20 bg-[#181818] gap-10 md:gap-0">
            <div class="flex-1 flex flex-col gap-4 text-center md:text-left items-center md:items-start">
                <span class="text-sm text-gray-400">Hola yo soy</span>
                <h1 class="text-lg font-bold text-[#959595]">Eduard Guevara</h1>
                <h1 class="text-3xl md:text-5xl font-bold text-[#ff8000]">Desarrollador WEB</h1>
                <div class="flex gap-4 mt-2 justify-center md:justify-start">
                    <a href="https://www.facebook.com/eduard.guevara.cristovive/" target="_blank"
                        class="text-gray-400 hover:text-[#ff8000]"><i class="bi bi-facebook text-xl"></i></a>
                    <a href="https://github.com/guevaraeduard" target="_blank"
                        class="text-gray-400 hover:text-[#ff8000]"><i class="bi bi-github text-xl"></i></a>
                    <a href="https://www.instagram.com/guevaraeduard/" target="_blank"
                        class="text-gray-400 hover:text-[#ff8000]"><i class="bi bi-instagram text-xl"></i></a>
                </div>
                <div class="flex gap-4 mt-6 justify-center md:justify-start flex-wrap">
                    <a href="#contacto"
                        class="px-6 py-2 bg-[#ff8000] text-white rounded-md font-semibold hover:bg-[#ff9900] transition">Contrátame</a>
                    <a href="#sobre-mi"
                        class="px-6 py-2 border border-[#ff8000] text-[#ff8000] rounded-md font-semibold hover:bg-[#ff8000] hover:text-white transition">Saber
                        Más</a>
                </div>
                <div class="flex gap-8 mt-8 justify-center md:justify-start flex-wrap bg-[#232323] p-4 rounded-lg">
                    <div class="flex flex-col items-center">
                        <span class="text-lg font-bold text-[#ff8000]">3+</span>
                        <span class="text-xs text-gray-400">Experiencias</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-lg font-bold text-[#ff8000]">20+</span>
                        <span class="text-xs text-gray-400">Proyectos terminados</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-lg font-bold text-[#ff8000]">10+</span>
                        <span class="text-xs text-gray-400">Clientes</span>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex justify-center mt-8 md:mt-0">
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
        </section>

        <!-- Experiencias -->
        <Experiencias />

        <!-- Sobre Mi -->
        <SobreMi />

        <!-- Skills -->
        <Skills />

        <!-- Portafolio -->
        <Portafolio :portfolios="portfolios" />

        <!-- Contacto -->
        <Contacto />
    </GuestLayout>

</template>
