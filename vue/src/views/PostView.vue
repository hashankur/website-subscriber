<template>
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0 flex">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Website Posts</h2>
        <a href="/addPost" class="mt-2 mx-5 text-lg leading-8 text-gray-600">Add post</a>
      </div>
      <div
        class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
      >
        <article
          v-for="website in websites"
          :key="website.id"
          class="flex max-w-xl flex-col items-start justify-between"
        >
          <div class="flex items-center gap-x-4 text-xs">
            <time :datetime="website.created_at" class="text-gray-500">{{
              new Date(website.created_at).toDateString()
            }}</time>
          </div>
          <div class="group relative">
            <h3
              class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
            >
              <a :href="website.href">
                <span class="absolute inset-0" />
                {{ website.title }}
              </a>
            </h3>
            <p class="line-clamp-3 text-sm leading-6 text-gray-600">
              {{ website.website }}
            </p>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
              {{ website.description }}
            </p>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const websites = ref([])

fetch('http://localhost:8000/api/posts')
  .then((response) => response.json())
  .then((data) => {
    websites.value = data
  })
</script>
