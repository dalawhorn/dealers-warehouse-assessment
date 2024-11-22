<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main>
    <header class="p-4">
      <Link class="underline text-blue-900" href="/">Home</Link> | 
      <Link class="underline text-blue-900" href="/customers/create">Create New Customer</Link>
    </header>
    <article class="p-4">
      <slot />
    </article>
  </main>
</template>