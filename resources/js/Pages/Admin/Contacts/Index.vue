<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Administración de Contactos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-blue-100 border border-blue-200 p-4 rounded-lg text-blue-800">
                                <h3 class="text-lg font-semibold">Total Contactos</h3>
                                <p class="text-3xl font-bold">{{ contacts.total }}</p>
                            </div>
                            <div class="bg-yellow-100 border border-yellow-200 p-4 rounded-lg text-yellow-800">
                                <h3 class="text-lg font-semibold">No Leídos</h3>
                                <p class="text-3xl font-bold">{{ unreadCount }}</p>
                            </div>
                            <div class="bg-green-100 border border-green-200 p-4 rounded-lg text-green-800">
                                <h3 class="text-lg font-semibold">Leídos</h3>
                                <p class="text-3xl font-bold">{{ readCount }}</p>
                            </div>
                        </div>

                        <!-- Filtros -->
                        <div class="mb-6 flex flex-wrap gap-4">
                            <button 
                                @click="filter = 'all'"
                                :class="[
                                    'px-4 py-2 rounded-md font-medium text-sm transition',
                                    filter === 'all' 
                                        ? 'bg-gray-900 text-white' 
                                        : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50'
                                ]"
                            >
                                Todos
                            </button>
                            <button 
                                @click="filter = 'unread'"
                                :class="[
                                    'px-4 py-2 rounded-md font-medium text-sm transition',
                                    filter === 'unread' 
                                        ? 'bg-gray-900 text-white' 
                                        : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50'
                                ]"
                            >
                                No Leídos
                            </button>
                            <button 
                                @click="filter = 'read'"
                                :class="[
                                    'px-4 py-2 rounded-md font-medium text-sm transition',
                                    filter === 'read' 
                                        ? 'bg-gray-900 text-white' 
                                        : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50'
                                ]"
                            >
                                Leídos
                            </button>
                        </div>

                        <!-- Tabla de contactos -->
                        <div class="overflow-x-auto border border-gray-200 rounded-lg">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Servicio
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="contact in filteredContacts" :key="contact.id" 
                                        class="hover:bg-gray-50"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span 
                                                :class="[
                                                    'inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                                                    contact.leido 
                                                        ? 'bg-green-100 text-green-800' 
                                                        : 'bg-yellow-100 text-yellow-800'
                                                ]"
                                            >
                                                {{ contact.leido ? 'Leído' : 'Nuevo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" :class="{'font-bold': !contact.leido}">
                                            {{ contact.nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ contact.email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ contact.servicio_interes }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ formatDate(contact.created_at) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <Link 
                                                    :href="route('admin.contacts.show', contact.id)"
                                                    class="text-gray-400 hover:text-blue-600"
                                                    title="Ver"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.27 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                                                </Link>
                                                <button 
                                                    v-if="!contact.leido"
                                                    @click="markAsRead(contact.id)"
                                                    class="text-gray-400 hover:text-green-600"
                                                    title="Marcar leído"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                                </button>
                                                <button 
                                                    @click="deleteContact(contact.id)"
                                                    class="text-gray-400 hover:text-red-600"
                                                    title="Eliminar"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" /></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
    contacts: Object
})

const filter = ref('all')

const filteredContacts = computed(() => {
    if (filter.value === 'all') {
        return props.contacts.data
    } else if (filter.value === 'unread') {
        return props.contacts.data.filter(contact => !contact.leido)
    } else if (filter.value === 'read') {
        return props.contacts.data.filter(contact => contact.leido)
    }
    return props.contacts.data
})

const unreadCount = computed(() => {
    return props.contacts.data.filter(contact => !contact.leido).length
})

const readCount = computed(() => {
    return props.contacts.data.filter(contact => contact.leido).length
})

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    })
}

const markAsRead = (contactId) => {
    router.patch(route('admin.contacts.mark-read', contactId))
}

const deleteContact = (contactId) => {
    if (confirm('¿Estás seguro de que quieres eliminar este contacto?')) {
        router.delete(route('admin.contacts.destroy', contactId))
    }
}
</script> 