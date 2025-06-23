<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Icon } from "@iconify/vue";
import GuestLayout from '../../Layouts/GuestLayout.vue';

const userFocused = ref(false);
const passFocused = ref(false);



defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
});

const submit = () => {
  form.post(route('login'), {
    onError: () => {
      console.log(form.errors);
    },
    onFinish: () => form.reset('password'),
  });
};



</script>

<template>
  <GuestLayout>

    <Head title="Iniciar sesión" />


    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

    <div class="relative w-full max-w-2xl mx-auto p-2 sm:max-w-lg md:max-w-2xl rounded-lg shadow-lg z-10">
      <!-- Login Form Card -->
      <div class="bg-[#232323] px-6 py-16 rounded-lg shadow-lg">
        <h2 class="text-xl sm:text-3xl text-white font-bold mb-2 sm:mb-3 text-center">Bienvenido!</h2>
        <p class="text-gray-300 mb-6 text-base sm:text-lg font-semibold text-center">Ingresa los datos para acceder a tu cuenta.</p>

        <form @submit.prevent="submit">
          <div class="mb-6 sm:mb-8">
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                <Icon icon="bi:person" :style="{ color: userFocused || form.email ? '#ff8000' : '#fff' }"
                  class="text-lg sm:text-xl"></Icon>
              </span>
              <input type="text" id="username" v-model="form.email" @focus="userFocused = true"
                @blur="userFocused = false"
                class="bg-transparent text-white w-full pl-9 pr-4 py-2 border-0 input-underline focus:input-focused-underline placeholder-transparent text-base font-semibold rounded-none"
                :class="userFocused ? 'input-focused-underline' : ''" placeholder=" ">
              <label for="username" :class="[
                'absolute left-9 transition-all duration-300 pointer-events-none text-[18px]',
                (userFocused || form.email) ? 'floating-label-active' : 'floating-label-inactive'
              ]">Correo electrónico</label>
            </div>

          </div>

          <div class="mb-6 sm:mb-8">
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none ">
                <Icon icon="bi:lock" :style="{ color: passFocused || form.password ? '#ff8000' : '#fff' }"
                  class="text-lg sm:text-xl"></Icon>
              </span>
              <input type="password" id="password" v-model="form.password" @focus="passFocused = true"
                @blur="passFocused = false"
                class="bg-transparent text-white w-full pl-9 pr-4 py-2 border-0 input-underline focus:input-focused-underline placeholder-transparent text-base font-semibold rounded-none"
                :class="passFocused ? 'input-focused-underline' : ''" placeholder=" ">
              <label for="password" :class="[
                'absolute left-9 transition-all duration-300 pointer-events-none text-[18px]',
                (passFocused || form.password) ? 'floating-label-active' : 'floating-label-inactive'
              ]">Contraseña</label>
            </div>
            
          </div>

          <button type="submit"
            class="w-full bg-[#ff8000] text-white font-bold py-3 sm:py-4 rounded-lg transition-all duration-300 text-lg sm:text-xl mb-3 sm:mb-4 hover:bg-gradient-to-r hover:from-[#ff8000] hover:to-[#FF9F1C] hover:shadow-lg hover:shadow-[#ff8000]/30">Iniciar
            sesión</button>

        </form>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
.input-label {
  color: #fff;
  transition: color 0.3s;
}

.input-focused-label {
  color: #ff8000;
}

.input-underline {
  border-bottom: 2px solid #fff;
  transition: border-color 0.3s;
}

.input-focused-underline {
  border-bottom: 2px solid #ff8000;
}

.floating-label-inactive {
  top: 14px;
  font-size: 1rem;
  color: #fff;
}

.floating-label-active {
  top: -12px;
  font-size: 0.85rem;
  color: #ff8000;
  padding: 0 4px;
}

input:focus {
  outline: none;
  box-shadow: none;
}
</style>
