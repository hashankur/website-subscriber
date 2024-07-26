<template>
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0 flex justify-between">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl grow">
          Subscribe to websites
        </h2>

        <div class="max-w-md gap-x-4">
          <label for="email-address" class="sr-only">Email address</label>
          <input
            id="email-address"
            name="email"
            type="email"
            autocomplete="email"
            required=""
            class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-black/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
            placeholder="Enter your email"
          />
        </div>
      </div>

      <ul role="list" class="divide-y divide-gray-100 mt-10">
        <li
          v-for="website in websites"
          :key="website.email"
          class="flex justify-between gap-x-6 py-5"
        >
          <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
              <p class="leading-6 text-gray-900">{{ website.domain }}</p>
            </div>
          </div>
          <button
            type="submit"
            class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
          >
            Subscribe
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const websites = ref([])
const userEmail = ref('')

fetch('http://localhost:8000/api/websites')
  .then((response) => response.json())
  .then((data) => {
    websites.value = data
  })

const addSubscription = (id) => {
  fetch('http://localhost:8000/api/subscribe', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      email: userEmail,
      website_id: id
    })
  })
}
</script>
