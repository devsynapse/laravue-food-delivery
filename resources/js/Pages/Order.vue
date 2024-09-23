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
</script>

<template>
    <div id="order-show">
        
    </div>
</template>