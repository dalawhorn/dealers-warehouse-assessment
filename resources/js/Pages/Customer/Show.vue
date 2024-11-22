<script setup>
import Layout from '../Layout.vue'
import { Head, Link } from '@inertiajs/vue3'
// import CustomerForm from '../../Components/CustomerForm.vue'

const props = defineProps({
    // businessTypes: Array,
    customerData: Object,
    businessType: String
})

const getShipmentDays = () => {
  let daysReturn = "";

  const mapDays = {
    "M": "Monday",
    "T": "Tuesday",
    "W": "Wednesday",
    "R": "Thursday",
    "F": "Friday"
  };

  const propsDays = props.customerData.shipment_days;
  propsDays.forEach(day => {
    if(daysReturn != "") {
      daysReturn += ", ";
    }

    daysReturn += mapDays[day];
  });
  
  return daysReturn;
}
</script>

<template>
  <Layout>
    <Head title="Customers" />
    <h1 class="text-2xl text-stone-950 pb-4">View Customer</h1>

    <table>
      <tbody>
        <tr>
          <td class="font-bold">Name: </td>
          <td>{{ customerData.name}}</td>
        </tr>
        <tr>
          <td class="font-bold">Billing Address: </td>
          <td>
            {{ customerData.address_1}}
            {{ customerData.address_2 }}
            {{ customerData.city + ", " + customerData.state + " " + customerData.zip }}
          </td>
        </tr>
        <tr>
          <td class="font-bold">Phone: </td>
          <td>{{ customerData.phone}}</td>
        </tr>
        <tr>
          <td class="font-bold">Email: </td>
          <td>{{ customerData.email}}</td>
        </tr>
        <tr>
          <td class="font-bold">Type of Business: </td>
          <td>{{ businessType }}</td>
        </tr>
        <tr>
          <td class="font-bold">Preferred Days of Receiving Shipments: </td>
          <td>{{ getShipmentDays() }}</td>
        </tr>
      </tbody>
    </table>

    <!-- <CustomerForm :businessTypes=businessTypes formType="edit" :customerData=customerData /> -->

  </Layout>
</template>