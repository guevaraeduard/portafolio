<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Detalles del Contacto
                </h2>
                <div class="flex space-x-2">
                    <Link 
                        :href="route('admin.contacts.index')"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition text-sm font-medium"
                    >
                        Volver
                    </Link>
                    <button 
                        @click="deleteContact"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm font-medium"
                    >
                        Eliminar
                    </button>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-gray-900">
                        <!-- Estado del contacto -->
                        <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                            <div>
                                <span 
                                    :class="[
                                        'inline-flex px-3 py-1 text-sm font-semibold rounded-full',
                                        contact.leido 
                                            ? 'bg-green-100 text-green-800' 
                                            : 'bg-yellow-100 text-yellow-800'
                                    ]"
                                >
                                    {{ contact.leido ? 'Leído' : 'Nuevo' }}
                                </span>
                            </div>
                            <div class="text-sm text-gray-500">
                                Recibido el {{ formatDate(contact.created_at) }}
                            </div>
                        </div>

                        <!-- Información del contacto -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Información Personal
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500">
                                            Nombre
                                        </label>
                                        <p class="mt-1 text-gray-900">
                                            {{ contact.nombre }}
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500">
                                            Email
                                        </label>
                                        <p class="mt-1 text-gray-900">
                                            <a 
                                                :href="`mailto:${contact.email}`"
                                                class="text-blue-600 hover:text-blue-800"
                                            >
                                                {{ contact.email }}
                                            </a>
                                        </p>
                                    </div>
                                    <div v-if="contact.telefono">
                                        <label class="block text-sm font-medium text-gray-500">
                                            Teléfono
                                        </label>
                                        <p class="mt-1 text-gray-900">
                                            <a 
                                                :href="`tel:${contact.telefono}`"
                                                class="text-blue-600 hover:text-blue-800"
                                            >
                                                {{ contact.telefono }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Información del Proyecto
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500">
                                            Servicio de Interés
                                        </label>
                                        <p class="mt-1">
                                            <span 
                                                class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800"
                                            >
                                                {{ contact.servicio_interes }}
                                            </span>
                                        </p>
                                    </div>
                                    <div v-if="contact.leido">
                                        <label class="block text-sm font-medium text-gray-500">
                                            Fecha de Lectura
                                        </label>
                                        <p class="mt-1 text-gray-900">
                                            {{ formatDate(contact.updated_at) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detalles del proyecto -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-2 text-gray-900">
                                Detalles del Proyecto
                            </h3>
                            <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg">
                                <p class="text-gray-800 whitespace-pre-wrap">
                                    {{ contact.detalles_proyecto }}
                                </p>
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <button 
                                v-if="!contact.leido"
                                @click="markAsRead"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition text-sm font-medium"
                            >
                                Marcar como Leído
                            </button>
                            <a 
                                :href="`mailto:${contact.email}?subject=Respuesta a tu consulta sobre ${contact.servicio_interes}`"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm font-medium"
                            >
                                Responder por Email
                            </a>
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
    contact: Object
})

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    })
}

const markAsRead = () => {
    router.patch(route('admin.contacts.mark-read', props.contact.id))
}

const deleteContact = () => {
    if (confirm('¿Estás seguro de que quieres eliminar este contacto?')) {
        router.delete(route('admin.contacts.destroy', props.contact.id))
    }
}
</script> 