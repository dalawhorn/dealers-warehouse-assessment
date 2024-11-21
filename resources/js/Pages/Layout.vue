<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main>
    <header>
      <Link href="/">Home</Link>
      <Link href="/customers/create">Create New Customer</Link>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>