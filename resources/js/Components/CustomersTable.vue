<script setup>
// import { ref } from 'vue'

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
        <tr>
            <td>
                <a href="">Test Co.</a>
            </td>
            <td>
                1/1/2024
            </td>
            <td>
                <a href="">Edit</a> | 
                <a href="">Delete</a>
            </td>
        </tr>
    </tbody>
  </table>
</template>