<script setup>
import Layout from '../Layout.vue'
import { Head, Link } from '@inertiajs/vue3'
import CustomerForm from '../../Components/CustomerForm.vue'

const props = defineProps({
    businessTypes: Array,
    customerData: Object
})
</script>

<template>
  <Layout>
    <Head title="Customers" />
    <h1 class="text-2xl text-stone-950 pb-4">Edit Customer</h1>

    <CustomerForm :businessTypes=businessTypes formType="edit" :customerData=customerData />

  </Layout>
</template>