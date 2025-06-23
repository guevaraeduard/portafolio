<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Administrar Portafolio
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Header con botón de crear -->
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-medium">Lista de Proyectos</h3>
                            <Link
                                :href="route('admin.portfolios.create')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Nuevo Proyecto
                            </Link>
                        </div>

                        <!-- Tabla de portafolios -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Imagen
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Título
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tipo
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Descripción
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Enlace
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Orden
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="portfolio in portfolios.data" :key="portfolio.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img
                                                v-if="portfolio.image"
                                                :src="portfolio.image_url"
                                                :alt="portfolio.title"
                                                class="h-16 w-16 object-cover rounded"
                                            />
                                            <div v-else class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-400 text-xs">Sin imagen</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ portfolio.title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
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
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs truncate">
                                                {{ portfolio.description }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a
                                                v-if="portfolio.link"
                                                :href="portfolio.link"
                                                target="_blank"
                                                class="text-blue-600 hover:text-blue-900 text-sm"
                                            >
                                                Ver enlace
                                            </a>
                                            <span v-else class="text-gray-400 text-sm">Sin enlace</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="[
                                                    'inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                                                    portfolio.is_active
                                                        ? 'bg-green-100 text-green-800'
                                                        : 'bg-red-100 text-red-800'
                                                ]"
                                            >
                                                {{ portfolio.is_active ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ portfolio.order }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <Link
                                                    :href="route('admin.portfolios.show', portfolio.id)"
                                                    class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition-colors"
                                                    title="Ver detalles"
                                                >
                                                    <Icon icon="bi:eye" class="w-5 h-5" />
                                                </Link>
                                                <Link
                                                    :href="route('admin.portfolios.edit', portfolio.id)"
                                                    class="text-indigo-600 hover:text-indigo-900 p-1 rounded hover:bg-indigo-50 transition-colors"
                                                    title="Editar proyecto"
                                                >
                                                    <Icon icon="bi:pencil" class="w-5 h-5" />
                                                </Link>
                                                <button
                                                    @click="toggleStatus(portfolio)"
                                                    :class="[
                                                        'p-1 rounded transition-colors',
                                                        portfolio.is_active
                                                            ? 'text-red-600 hover:text-red-900 hover:bg-red-50'
                                                            : 'text-green-600 hover:text-green-900 hover:bg-green-50'
                                                    ]"
                                                    :title="portfolio.is_active ? 'Desactivar proyecto' : 'Activar proyecto'"
                                                >
                                                    <Icon 
                                                        :icon="portfolio.is_active ? 'bi:eye-slash' : 'bi:eye'" 
                                                        class="w-5 h-5" 
                                                    />
                                                </button>
                                                <button
                                                    @click="deletePortfolio(portfolio)"
                                                    class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition-colors"
                                                    title="Eliminar proyecto"
                                                >
                                                    <Icon icon="bi:trash" class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
import { Icon } from "@iconify/vue"

const props = defineProps({
    portfolios: Object,
})

const toggleStatus = (portfolio) => {
    router.patch(route('admin.portfolios.toggle-status', portfolio.id))
}

const deletePortfolio = (portfolio) => {
    if (confirm('¿Estás seguro de que quieres eliminar este proyecto?')) {
        router.delete(route('admin.portfolios.destroy', portfolio.id))
    }
}
</script> 