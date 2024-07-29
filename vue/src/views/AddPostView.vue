<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div
      class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
      aria-hidden="true"
    ></div>
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Add new post</h2>
    </div>
    <form class="mx-auto mt-16 max-w-xl sm:mt-20" @submit.prevent="getFormValues">
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">
            Title
          </label>
          <div class="mt-2.5">
            <input
              v-model="title"
              type="text"
              name="title"
              id="title"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">
            Website
          </label>
          <div class="mt-2.5">
            <input
              v-model="website"
              type="url"
              name="website"
              id="website"
              autocomplete="url"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">
            Description
          </label>
          <div class="mt-2.5">
            <textarea
              v-model="message"
              name="message"
              id="message"
              rows="4"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
      </div>
      <div class="mt-10">
        <button
          @click="createPost"
          class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const title = ref('')
const website = ref('')
const message = ref('')

const createPost = async () => {
  const response = await fetch('http://localhost:8000/api/posts', {
    method: 'POST',
    credentials: 'include',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      title: title.value,
      website: website.value,
      message: message.value
    })
  })

  if (response.ok) {
    console.log(response)
  } else {
    alert('Failed to create post!')
  }
}
</script>
