<script setup lang="ts">
</script>

<template>
   <div class="bg-[#252525] flex items-center justify-center min-h-screen">

    <slot />
    <!-- Curved lines background -->
    <div class="curved-bg-container fixed inset-0 overflow-hidden">
      <div class="curved-line top-left"></div>
      <div class="curved-line bottom-right"></div>
    </div>
  </div>

</template>
