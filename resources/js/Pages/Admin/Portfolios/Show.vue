<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalles del Proyecto
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Header con botones de acción -->
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-medium">{{ portfolio.title }}</h3>
                            <div class="flex space-x-2">
                                <Link
                                    :href="route('admin.portfolios.edit', portfolio.id)"
                                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Editar
                                </Link>
                                <Link
                                    :href="route('admin.portfolios.index')"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Volver
                                </Link>
                            </div>
                        </div>

                        <!-- Información del proyecto -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Imagen -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">
                                    Imagen del Proyecto
                                </h4>
                                <div v-if="portfolio.image" class="bg-gray-100 rounded-lg p-4">
                                    <img
                                        :src="portfolio.image_url"
                                        :alt="portfolio.title"
                                        class="w-full h-64 object-cover rounded-lg"
                                    />
                                </div>
                                <div v-else class="bg-gray-100 rounded-lg p-4 h-64 flex items-center justify-center">
                                    <span class="text-gray-400">Sin imagen</span>
                                </div>
                            </div>

                            <!-- Detalles -->
                            <div class="space-y-4">
                                <!-- Título -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Título
                                    </h4>
                                    <p class="mt-1 text-lg text-gray-900">{{ portfolio.title }}</p>
                                </div>

                                <!-- Descripción -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Descripción
                                    </h4>
                                    <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ portfolio.description }}</p>
                                </div>

                                <!-- Tipo -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Tipo de Proyecto
                                    </h4>
                                    <span
                                        :class="[
                                            'inline-flex px-2 py-1 text-xs font-semibold rounded-full mt-1',
                                            portfolio.type === 'desarrollo_web'
                                                ? 'bg-blue-100 text-blue-800'
                                                : 'bg-purple-100 text-purple-800'
                                        ]"
                                    >
                                        {{ portfolio.type === 'desarrollo_web' ? 'Desarrollo Web' : 'Aplicación' }}
                                    </span>
                                </div>

                                <!-- Enlace -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Enlace
                                    </h4>
                                    <div v-if="portfolio.link" class="mt-1">
                                        <a
                                            :href="portfolio.link"
                                            target="_blank"
                                            class="text-blue-600 hover:text-blue-900 underline"
                                        >
                                            {{ portfolio.link }}
                                        </a>
                                    </div>
                                    <p v-else class="mt-1 text-gray-400">Sin enlace</p>
                                </div>

                                <!-- Estado -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Estado
                                    </h4>
                                    <span
                                        :class="[
                                            'inline-flex px-2 py-1 text-xs font-semibold rounded-full mt-1',
                                            portfolio.is_active
                                                ? 'bg-green-100 text-green-800'
                                                : 'bg-red-100 text-red-800'
                                        ]"
                                    >
                                        {{ portfolio.is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </div>

                                <!-- Orden -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                        Orden
                                    </h4>
                                    <p class="mt-1 text-gray-900">{{ portfolio.order }}</p>
                                </div>

                                <!-- Fechas -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                            Creado
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-900">
                                            {{ new Date(portfolio.created_at).toLocaleDateString('es-ES') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                                            Actualizado
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-900">
                                            {{ new Date(portfolio.updated_at).toLocaleDateString('es-ES') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Acciones adicionales -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <button
                                        @click="toggleStatus"
                                        :class="[
                                            'font-bold py-2 px-4 rounded',
                                            portfolio.is_active
                                                ? 'bg-red-500 hover:bg-red-700 text-white'
                                                : 'bg-green-500 hover:bg-green-700 text-white'
                                        ]"
                                    >
                                        {{ portfolio.is_active ? 'Desactivar' : 'Activar' }} Proyecto
                                    </button>
                                </div>
                                <div>
                                    <button
                                        @click="deletePortfolio"
                                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Eliminar Proyecto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
    portfolio: Object,
})

const toggleStatus = () => {
    router.patch(route('admin.portfolios.toggle-status', props.portfolio.id))
}

const deletePortfolio = () => {
    if (confirm('¿Estás seguro de que quieres eliminar este proyecto? Esta acción no se puede deshacer.')) {
        router.delete(route('admin.portfolios.destroy', props.portfolio.id))
    }
}
</script> 