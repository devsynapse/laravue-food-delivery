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
    <div id="popular-products-list">
        <h2 class="text-center py-6 text-3xl font-extrabold">Orders</h2>
        <div id="orders-list" class="flex flex-col gap-2">

            <div v-for="order in orders" class="bg-white rounded p-4 w-full">
                <p>Order Id: {{ order.id }} First name: {{ order.first_name }} Last name: {{ order.last_name }} Comment: {{ order.comment }} </p>
            </div>

        </div>
    </div>
</template>