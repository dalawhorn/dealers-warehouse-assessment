<script setup>
import Layout from '../Layout.vue'
import { Head, Link } from '@inertiajs/vue3'
import CustomersTable from '../../Components/CustomersTable.vue'

defineProps({ customers: Array })
</script>

<template>
  <Layout>
    <Head title="Customers" />
    <h1 class="text-2xl text-stone-950 pb-4">Customers</h1>

    <div v-if="customers.length > 0">
        <CustomersTable :customers=customers />
    </div>
    <div v-else>
        You currently have no customers. <Link class="underline text-blue-900" href="/customers/create">Create New Customer</Link>
    </div>

  </Layout>
</template>