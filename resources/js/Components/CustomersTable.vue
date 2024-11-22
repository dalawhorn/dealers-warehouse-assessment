<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({ customers: Array })
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
            <td>{{ customer.name }}</td>
            <td>{{ customer.created_at }}</td>
            <td>
                <Link :href="'/customers/' + customer.id + '/edit'">Edit</Link> | 
                <a href="">Delete</a>
            </td>
        </tr>
    </tbody>
  </table>
</template>