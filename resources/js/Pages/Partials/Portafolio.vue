<template>
    <section id="portafolio" class="w-full px-4 sm:px-6 md:px-16 py-12 md:py-16 bg-[#181818]">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6 md:mb-8 text-white">Portafolio</h2>
        
        <!-- Filtros por tipo -->
        <div class="flex flex-wrap justify-center gap-2 md:gap-4 mb-6 md:mb-8">
            <button 
                @click="activeFilter = 'all'"
                :class="[
                    'px-4 py-2 rounded font-semibold text-xs md:text-base transition-colors',
                    activeFilter === 'all'
                        ? 'bg-[#ff8000] text-white'
                        : 'bg-[#232323] text-white hover:bg-[#333333]'
                ]"
            >
                Todos
            </button>
            <button 
                @click="activeFilter = 'desarrollo_web'"
                :class="[
                    'px-4 py-2 rounded font-semibold text-xs md:text-base transition-colors',
                    activeFilter === 'desarrollo_web'
                        ? 'bg-[#ff8000] text-white'
                        : 'bg-[#232323] text-white hover:bg-[#333333]'
                ]"
            >
                Desarrollo Web
            </button>
            <button 
                @click="activeFilter = 'aplicacion'"
                :class="[
                    'px-4 py-2 rounded font-semibold text-xs md:text-base transition-colors',
                    activeFilter === 'aplicacion'
                        ? 'bg-[#ff8000] text-white'
                        : 'bg-[#232323] text-white hover:bg-[#333333]'
                ]"
            >
                Aplicaciones
            </button>
        </div>

        <!-- Grid de proyectos -->
        <div class="w-full max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div 
                    v-for="portfolio in filteredPortfolios" 
                    :key="portfolio.id"
                    class="bg-[#232323] rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300"
                >
                    <!-- Imagen del proyecto -->
                    <div class="h-48 bg-[#333333] flex items-center justify-center overflow-hidden">
                        <img 
                            v-if="portfolio.image"
                            :src="portfolio.image_url" 
                            :alt="portfolio.title"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                        />
                        <div v-else class="flex items-center justify-center h-full">
                            <span class="text-gray-400 text-sm">Sin imagen</span>
                        </div>
                    </div>
                    
                    <!-- Contenido del proyecto -->
                    <div class="p-6">
                        <!-- Tipo de proyecto -->
                        <div class="mb-3">
                            <span
                                :class="[
                                    'inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                                    portfolio.type === 'desarrollo_web'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-purple-100 text-purple-800'
                                ]"
                            >
                                {{ portfolio.type === 'desarrollo_web' ? 'Desarrollo Web' : 'Aplicación' }}
                            </span>
                        </div>
                        
                        <!-- Título -->
                        <h3 class="text-xl font-bold text-white mb-3">{{ portfolio.title }}</h3>
                        
                        <!-- Descripción -->
                        <p class="text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ portfolio.description }}
                        </p>
                        
                        <!-- Enlace -->
                        <div v-if="portfolio.link" class="mt-4">
                            <a 
                                :href="portfolio.link" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-4 py-2 bg-[#ff8000] text-white font-semibold rounded hover:bg-[#e67300] transition-colors duration-200"
                            >
                                Ver Proyecto
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mensaje cuando no hay proyectos -->
            <div v-if="filteredPortfolios.length === 0" class="text-center py-12">
                <p class="text-gray-400 text-lg">No hay proyectos disponibles en esta categoría.</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
    portfolios: {
        type: Array,
        default: () => []
    }
})

const activeFilter = ref('all')

const filteredPortfolios = computed(() => {
    if (activeFilter.value === 'all') {
        return props.portfolios
    }
    return props.portfolios.filter(portfolio => portfolio.type === activeFilter.value)
})




</script>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>