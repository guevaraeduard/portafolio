<template>
    <section id="contacto" class="w-full px-4 sm:px-6 md:px-16 py-12 md:py-16 bg-[#181818]">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-2">Contacto</h2>
        <p class="text-center text-gray-400 mb-6 md:mb-8 text-sm md:text-base">Cultivando Conexiones: Ponte En Contacto
            Y
            Conéctate Conmigo</p>

        <!-- Mensaje de éxito -->
        <div v-if="success" class="max-w-4xl mx-auto mb-6 p-4 bg-green-600 text-white rounded-md">
            {{ success }}
        </div>



        <form @submit.prevent="submitForm" class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
            <div>
                <input v-model="form.nombre" type="text" placeholder="Nombre" :class="[
                    'bg-[#232323] rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff8000] text-sm md:text-base w-full',
                    form.errors.nombre ? 'border-red-500' : ''
                ]">
                <p v-if="form.errors.nombre" class="text-red-500 text-xs mt-1">{{ form.errors.nombre }}</p>
            </div>

            <div>
                <input v-model="form.email" type="email" placeholder="Correo Electrónico" :class="[
                    'bg-[#232323] rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff8000] text-sm md:text-base w-full',
                    form.errors.email ? 'border-red-500' : ''
                ]">
                <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
            </div>

            <div>
                <input v-model="form.telefono" type="text" placeholder="Número de Teléfono"
                    class="bg-[#232323] rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff8000] text-sm md:text-base w-full">
            </div>

            <div>
                <select v-model="form.servicio_interes" :class="[
                    'bg-[#232323] rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff8000] text-sm md:text-base w-full',
                    form.errors.servicio_interes ? 'border-red-500' : ''
                ]">
                    <option value="">Servicio de Interés</option>
                    <option value="Diseño Web">Diseño Web</option>
                    <option value="Diseño de Aplicaciones">Diseño de Aplicaciones</option>
                    <option value="Branding">Branding</option>
                </select>
                <p v-if="form.errors.servicio_interes" class="text-red-500 text-xs mt-1">{{ form.errors.servicio_interes
                    }}</p>
            </div>

            <div class="sm:col-span-2 md:col-span-2">
                <textarea v-model="form.detalles_proyecto" placeholder="Detalles del Proyecto.." :class="[
                    'bg-[#232323] rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff8000] text-sm md:text-base w-full h-32',
                    form.errors.detalles_proyecto ? 'border-red-500' : ''
                ]"></textarea>
                <p v-if="form.errors.detalles_proyecto" class="text-red-500 text-xs mt-1">{{
                    form.errors.detalles_proyecto }}</p>
            </div>

            <div class="sm:col-span-2 md:col-span-2 flex justify-end">
                <button type="submit" :disabled="loading"
                    class="px-6 py-2 md:px-8 bg-[#232323] border border-[#ff8000] text-[#ff8000] rounded-md font-semibold hover:bg-[#ff8000] hover:text-white transition text-sm md:text-base disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loading">Enviando...</span>
                    <span v-else>Enviar</span>
                </button>
            </div>
        </form>
    </section>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const loading = ref(false)
const success = ref('')

const form = useForm({
    nombre: '',
    email: '',
    telefono: '',
    servicio_interes: '',
    detalles_proyecto: ''
})

const submitForm = async () => {
    loading.value = true
    success.value = ''
    form.post(route("contacto.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            success.value = 'Mensaje enviado con éxito, pronto me pondré en contacto contigo.';
            setTimeout(() => {
                success.value = '';
            }, 3000);
        },
    });
    loading.value = false
}
</script>

<style scoped>
select option {
    background-color: #232323 !important;
    color: white !important;
}

select {
    color: white !important;
}

/* Webkit browsers (Chrome, Safari) */
select::-webkit-select-placeholder {
    color: white;
}

select option:checked {
    background-color: #ff8000 !important;
    color: white !important;
}

select option:hover {
    background-color: #ff8000 !important;
    color: white !important;
}
</style>