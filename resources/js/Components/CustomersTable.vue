<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({ customers: Array })

const doDelete = (event, customerId, customerName) => {
    if (!window.confirm("Are you sure you want to delete " + customerName + "?")) {
        return event.preventDefault();
    }

    router.delete('/customers/' + customerId);
}
</script>

<template>
  <table>
    <thead>
        <tr>
            <th>
                Customer Name
            </th>
            <th>
                Date Added
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="customer in customers">
            <td class="p-2"><Link class="underline text-blue-900" :href="'/customers/' + customer.id">{{ customer.name }}</Link></td>
            <td class="p-2">{{ customer.created_at }}</td>
            <td class="p-2">
                <Link class="underline text-blue-900" :href="'/customers/' + customer.id + '/edit'">Edit</Link> | 
                <button class="underline text-blue-900" @click="(event) => doDelete(event, customer.id, customer.name)">Delete</button>
            </td>
        </tr>
    </tbody>
  </table>
</template>