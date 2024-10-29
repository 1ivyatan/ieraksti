<script setup>
  import {ref} from 'vue'
  let count = ref(0)
  const incrementCounter = () => count.value++
  const decrementCounter = () => count.value--
</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-b border-gray-100"
    >
        <div
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
        >
        <h3 >{{count}}</h3>
        <div><button class="actions" @click="decrementCounter"> - </button><button class="actions" @click="incrementCounter"> + </button></div>
        </div>
    </div>
</template>