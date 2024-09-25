<script setup>
import { ref, onMounted } from 'vue'

const order = ref([])

onMounted(async() => {
    getOrder();
})

const getOrder = async (orderId) => {
    axios.get(`/api/order/${orderId}`)
        .then(response => {
            order.value = response.data.data;
        })
        .catch(error => console.log(error))
}

const updateOrder = async (orderId) => {
    axios.put(`/api/order/${orderId}`)
        .then(response => {
           
        })
        .catch(error => console.log(error))
}    
</script>

<template>
    <div id="order-show">
        <div class="flex flex-row">
            <h1 class="text-center py-6 text-3xl font-extrabold">Order #{{ order.id }}</h1>
        </div>
        <div class="flex flex-row">

        </div>    
        
        
    </div>
</template>