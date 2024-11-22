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
    <div class="mb-2">
        <label for="name">Name:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="name" v-model="form.name" placeholder="Customer Name" />
            <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label for="address_1">Billing Address:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="address_1" v-model="form.address_1" placeholder="123 Main St" />
            <div class="text-red-600" v-if="form.errors.address_1">{{ form.errors.address_1 }}</div>
            <br />
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="address_2" v-model="form.address_2" placeholder="Apt. 404" />
            <div class="text-red-600" v-if="form.errors.address_2">{{ form.errors.address_2 }}</div>
        </div>
        
    </div>

    <div class="mb-2">
        <label for="city">City:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="city" v-model="form.city" placeholder="Knoxville" />
            <div class="text-red-600" v-if="form.errors.city">{{ form.errors.city }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label for="state">State:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="state" v-model="form.state" placeholder="TN" />
            <div class="text-red-600" v-if="form.errors.state">{{ form.errors.state }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label for="zip">Zip Code:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="zip" v-model="form.zip" placeholder="37932" />
            <div class="text-red-600" v-if="form.errors.zip">{{ form.errors.zip }}</div>
        </div>
    </div>
    
    <div class="mb-2">
        <label for="phone">Phone:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="phone" v-model="form.phone" placeholder="865-555-1234"/>
            <div class="text-red-600" v-if="form.errors.phone">{{ form.errors.phone }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label for="email">Email:</label>
        <div>
            <input class="border-2 border-gray-600 rounded-md mb-1 p-1" id="email" v-model="form.email" placeholder="email@example.com" />
            <div class="text-red-600" v-if="form.errors.email">{{ form.errors.email }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label for="business_type_id">Business Type:</label>
        <div>
            <select class="border-2 border-gray-600 rounded-md mb-1 p-1" id="business_type_id" name="business_type_id"  v-model="form.business_type_id">
                <option>Select...</option>
                <option v-for="businessType in businessTypes" :value=businessType.id>{{ businessType.name }}</option>
            </select>
            <div class="text-red-600" v-if="form.errors.business_type_id">{{ form.errors.business_type_id }}</div>
        </div>
    </div>

    <div class="mb-2">
        <label>Shipment Days:</label>
        <div>
            <label class="mr-4"><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="M" /> Monday</label>
            <label class="mr-4"><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="T" /> Tuesday</label>
            <label class="mr-4"><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="W" /> Wednesday</label>
            <label class="mr-4"><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="R" /> Thursday</label>
            <label class="mr-4"><input v-model="form.shipment_days" name="shipment_days[]" type="checkbox" value="F" /> Friday</label>
            <div class="text-red-600" v-if="form.errors.shipment_days">{{ form.errors.shipment_days }}</div>
        </div>
    </div>
    
    <button class="text-white bg-blue-950 px-4 py-2 rounded-md hover:bg-blue-800 mt-2" type="submit">Submit</button>
  </form>
</template>