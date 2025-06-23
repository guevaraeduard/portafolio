<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Reactive data for mobile menu
const isMenuOpen = ref(false);

// Methods for mobile menu
const openMenu = () => {
  isMenuOpen.value = true;
};

const closeMenu = () => {
  isMenuOpen.value = false;
};

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
  <div class="bg-[#181818] text-white font-['Montserrat',sans-serif]">
    <header
      class="w-full px-4 sm:px-6 md:px-16 py-6 flex flex-col md:flex-row items-center justify-between bg-[#181818] gap-4 md:gap-0 relative">
      <!-- Botón hamburguesa solo en móvil -->
      <button @click="openMenu"
        class="md:hidden absolute left-4 top-6 z-30 p-2 rounded-lg hover:bg-[#232323] focus:outline-none">
        <i class="bi bi-list text-3xl text-[#ff8000]"></i>
      </button>
      <!-- Overlay para móvil -->
      <div @click="closeMenu" 
        class="fixed inset-0 bg-black/60 z-20 transition-opacity duration-300"
        :class="isMenuOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'">
      </div>
      <div class="flex items-center gap-2 mb-4 md:mb-0">
        <img src="assets/images/logo.png" alt="Logo" class="w-full h-auto">
      </div>
      <nav
        class="flex-col md:flex-row flex gap-8 text-sm font-medium fixed md:static top-0 left-0 w-2/3 max-w-lg h-full bg-[#181818] md:bg-transparent z-30 md:z-auto p-8 md:p-0 transform transition-transform duration-300 ease-in-out md:flex md:items-center md:justify-center md:w-auto md:h-auto md:gap-8 md:relative"
        :class="isMenuOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
        <button @click="closeMenu"
          class="md:hidden absolute top-4 right-4 p-2 rounded-lg hover:bg-[#232323] focus:outline-none">
          <i class="bi bi-x-lg text-2xl text-[#ff8000]"></i>
        </button>
        <Link :href="route('welcome')" class="hover:text-[#ff8000] transition"
          :class="{ 'text-[#ff8000]': route().current('welcome') }">Inicio</Link>
        <Link :href="route('experiencias')" class="hover:text-[#ff8000] transition"
          :class="{ 'text-[#ff8000]': route().current('experiencias') }">Experiencias</Link>
        <Link :href="route('sobre-mi')" class="hover:text-[#ff8000] transition"
          :class="{ 'text-[#ff8000]': route().current('sobre-mi') }">Sobre Mi</Link>
        <Link :href="route('portafolio')" class="hover:text-[#ff8000] transition"
          :class="{ 'text-[#ff8000]': route().current('portafolio') }">Portafolio</Link>
        <Link :href="route('contacto')" class="hover:text-[#ff8000] transition"
          :class="{ 'text-[#ff8000]': route().current('contacto') }">Contacto</Link>
      </nav>
      <Link :href="route('contacto')"
        class="ml-0 md:ml-8 mt-4 md:mt-0 px-6 py-2 bg-[#ff8000] text-white rounded-md font-semibold hover:bg-[#ff9900] transition">
      Contáctame</Link>
    </header>

    <slot />

    <footer class="bg-[#181818] text-white py-8 mt-12 border-t border-[#232323]">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4 md:gap-6 px-4 sm:px-6 md:px-16">
        <div class="flex items-center gap-2">
          <img src="assets/images/logo.png" alt="Logo" class="w-full h-auto">
        </div>
        <nav class="flex flex-wrap justify-center gap-4 md:gap-6">
          <Link :href="route('welcome')" class="text-sm hover:text-[#ff8000] transition-colors"
            :class="{ 'text-[#ff8000]': route().current('welcome') }">Inicio</Link>
          <Link :href="route('experiencias')" class="text-sm hover:text-[#ff8000] transition-colors"
            :class="{ 'text-[#ff8000]': route().current('experiencias') }">Experiencias</Link>
          <Link :href="route('sobre-mi')" class="text-sm hover:text-[#ff8000] transition-colors"
            :class="{ 'text-[#ff8000]': route().current('sobre-mi') }">Sobre Mi</Link>
          <Link :href="route('portafolio')" class="text-sm hover:text-[#ff8000] transition-colors"
            :class="{ 'text-[#ff8000]': route().current('portafolio') }">Portafolio</Link>
          <Link :href="route('contacto')" class="text-sm hover:text-[#ff8000] transition-colors"
            :class="{ 'text-[#ff8000]': route().current('contacto') }">Contacto</Link>
        </nav>
        <div class="flex gap-4">
          <a href="https://www.facebook.com/eduard.guevara.cristovive/"
            class="text-xl hover:text-[#ff8000] transition-colors"><i class="bi bi-facebook"></i></a>
          <a href="https://github.com/guevaraeduard" target="_blank"
            class="text-xl hover:text-[#ff8000] transition-colors"><i class="bi bi-github"></i></a>
          <a href="https://www.instagram.com/guevaraeduard/" target="_blank"
            class="text-xl hover:text-[#ff8000] transition-colors"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
      <div class="mt-8 pt-6 border-t border-[#232323] text-center text-sm text-gray-400">
        Eduard@email.com &nbsp; | &nbsp; +58 4142385466 <br>
        Todos los derechos reservados.
      </div>
    </footer>
  </div>
</template>
