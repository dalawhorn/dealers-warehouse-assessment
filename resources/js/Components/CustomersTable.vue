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
            <td><Link :href="'/customers/' + customer.id">{{ customer.name }}</Link></td>
            <td>{{ customer.created_at }}</td>
            <td>
                <Link :href="'/customers/' + customer.id + '/edit'">Edit</Link> | 
                <button @click="(event) => doDelete(event, customer.id, customer.name)">Delete</button>
            </td>
        </tr>
    </tbody>
  </table>
</template>