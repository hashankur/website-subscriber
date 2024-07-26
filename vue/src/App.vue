<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div>
      <nav class="mx-auto max-w-7xl px-6 lg:px-8 flex gap-10 text-gray-800 font-semibold py-5">
        <RouterLink to="/">Posts</RouterLink>
        <RouterLink to="/websites">Websites</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>
