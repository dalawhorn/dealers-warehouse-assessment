<script setup>
import Layout from '../Layout.vue'
import { Head, Link } from '@inertiajs/vue3'
import CustomerForm from '../../Components/CustomerForm.vue'

defineProps({ businessTypes: Array })
</script>

<template>
  <Layout>
    <Head title="Customers" />
    <h1>New Customer</h1>

    <CustomerForm :businessTypes=businessTypes />

  </Layout>
</template>