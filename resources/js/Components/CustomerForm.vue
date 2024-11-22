<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    businessTypes: Array,
    formType: String,
    customerData: Object
})

let formData = {
  name: null,
  address_1: null,
  address_2: null,
  city: null,
  state: null,
  zip: null,
  phone: null,
  email: null,
  business_type_id: null,
  shipment_days: [],
};

let submitUrl = '/customers';

if (props.formType === "edit"){
    submitUrl = submitUrl + "/" + props.customerData.id;
    formData = props.customerData;
}

const form = useForm(formData);

</script>

<template>
  <form @submit.prevent="form.post(submitUrl)">
    <div>
        <label for="name">Name:</label>
        <input id="name" v-model="form.name" />
        <div v-if="form.errors.name">{{ form.errors.name }}</div>
    </div>

    <div>
        <label for="address_1">Billing Address:</label>
        <input id="address_1" v-model="form.address_1" />
        <div v-if="form.errors.address_1">{{ form.errors.address_1 }}</div>
        <br />
        <input id="address_2" v-model="form.address_2" />
        <div v-if="form.errors.address_2">{{ form.errors.address_2 }}</div>
    </div>

    <div>
        <label for="city">City:</label>
        <input id="city" v-model="form.city" />
        <div v-if="form.errors.city">{{ form.errors.city }}</div>
    </div>

    <div>
        <label for="state">State:</label>
        <input id="state" v-model="form.state" />
        <div v-if="form.errors.state">{{ form.errors.state }}</div>
    </div>

    <div>
        <label for="zip">Zip Code:</label>
        <input id="zip" v-model="form.zip" />
        <div v-if="form.errors.zip">{{ form.errors.zip }}</div>
    </div>
    
    <div>
        <label for="phone">Phone:</label>
        <input id="phone" v-model="form.phone" />
        <div v-if="form.errors.phone">{{ form.errors.phone }}</div>
    </div>

    <div>
        <label for="email">Email:</label>
        <input id="email" v-model="form.email" />
        <div v-if="form.errors.email">{{ form.errors.email }}</div>
    </div>

    <div>
        <label for="business_type_id">Business Type:</label>
        <select id="business_type_id" name="business_type_id"  v-model="form.business_type_id">
            <option>Select...</option>
            <option v-for="businessType in businessTypes" :value=businessType.id>{{ businessType.name }}</option>
        </select>
        <div v-if="form.errors.business_type_id">{{ form.errors.business_type_id }}</div>
    </div>

    <div>
        <label>Shipment Days:</label>
        <label><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="M" /> Monday</label>
        <label><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="T" /> Tuesday</label>
        <label><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="W" /> Wednesday</label>
        <label><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="R" /> Thursday</label>
        <label><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="F" /> Friday</label>
        <div v-if="form.errors.shipment_days">{{ form.errors.shipment_days }}</div>
    </div>
    
    <button type="submit">Submit</button>
  </form>
</template>