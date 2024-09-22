<script setup>
import { ref, onMounted } from 'vue'

const orders = ref([])

onMounted(async() => {
    fetchOrders();
})

const fetchOrders = async () => {
    await axios.get('/api/orders')
        .then(response => orders.value = response.data.data)
        .catch(error => console.log(error))
}
</script>

<template>
    <div id="order-show">
        
    </div>
</template>