<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Proyecto
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Título -->
                            <div>
                                <InputLabel for="title" value="Título" />
                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />
                                <InputError :message="form.errors.title" class="mt-2" />
                            </div>

                            <!-- Descripción -->
                            <div>
                                <InputLabel for="description" value="Descripción" />
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    rows="4"
                                    required
                                ></textarea>
                                <InputError :message="form.errors.description" class="mt-2" />
                            </div>

                            <!-- Tipo -->
                            <div>
                                <InputLabel for="type" value="Tipo de Proyecto" />
                                <select
                                    id="type"
                                    v-model="form.type"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required
                                >
                                    <option value="">Seleccionar tipo</option>
                                    <option value="desarrollo_web">Desarrollo Web</option>
                                    <option value="aplicacion">Aplicación</option>
                                </select>
                                <InputError :message="form.errors.type" class="mt-2" />
                            </div>

                            <!-- Imagen actual -->
                            <div v-if="portfolio.image" class="mb-4">
                                <InputLabel value="Imagen actual" />
                                <div class="mt-2">
                                    <img
                                        :src="portfolio.image_url"
                                        :alt="portfolio.title"
                                        class="h-32 w-32 object-cover rounded-lg border"
                                    />
                                </div>
                            </div>

                            <!-- Nueva imagen -->
                            <div>
                                <InputLabel for="image" value="Nueva imagen (opcional)" />
                                <input
                                    id="image"
                                    type="file"
                                    @change="handleImageChange"
                                    accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                />
                                <InputError :message="form.errors.image" class="mt-2" />
                                
                                <!-- Vista previa de la nueva imagen -->
                                <div v-if="imagePreview" class="mt-4">
                                    <InputLabel value="Vista previa de la nueva imagen" />
                                    <img
                                        :src="imagePreview"
                                        alt="Vista previa"
                                        class="h-32 w-32 object-cover rounded-lg border"
                                    />
                                </div>
                            </div>

                            <!-- Enlace -->
                            <div>
                                <InputLabel for="link" value="Enlace (opcional)" />
                                <TextInput
                                    id="link"
                                    type="url"
                                    class="mt-1 block w-full"
                                    v-model="form.link"
                                    placeholder="https://ejemplo.com"
                                />
                                <InputError :message="form.errors.link" class="mt-2" />
                            </div>

                            <!-- Orden -->
                            <div>
                                <InputLabel for="order" value="Orden" />
                                <TextInput
                                    id="order"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.order"
                                    min="0"
                                />
                                <InputError :message="form.errors.order" class="mt-2" />
                            </div>

                            <!-- Estado activo -->
                            <div class="flex items-center">
                                <Checkbox
                                    id="is_active"
                                    v-model:checked="form.is_active"
                                    name="is_active"
                                />
                                <InputLabel for="is_active" value="Proyecto activo" class="ml-2" />
                                <InputError :message="form.errors.is_active" class="mt-2" />
                            </div>

                            <!-- Botones -->
                            <div class="flex items-center justify-end mt-4 space-x-4">
                                <Link
                                    :href="route('admin.portfolios.index')"
                                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    Cancelar
                                </Link>
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Actualizar Proyecto
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue'
import { useForm, Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import Checkbox from '@/Components/Checkbox.vue'

const props = defineProps({
    portfolio: Object,
})

const imagePreview = ref(null)

const form = useForm({
    title: props.portfolio.title,
    description: props.portfolio.description,
    image: null,
    link: props.portfolio.link || '',
    is_active: props.portfolio.is_active,
    order: props.portfolio.order,
    type: props.portfolio.type,
    _method: 'PUT',
})

const handleImageChange = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.image = file
        // Crear vista previa
        const reader = new FileReader()
        reader.onload = (e) => {
            imagePreview.value = e.target.result
        }
        reader.readAsDataURL(file)
    }
}

const submit = () => {
    form.post(route('admin.portfolios.update', props.portfolio.id))
}
</script> 