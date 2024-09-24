<script setup>
import { ref, onMounted } from 'vue'
import useOrders from '@/Composables/Orders'

const { orders, getOrders } = useOrders()

onMounted(async() => {
    getOrders();
})

</script>

<template>
    <div id="popular-products-list">
        <h2 class="text-center py-6 text-3xl font-extrabold">Orders</h2>
        <div id="orders-list" class="flex flex-col gap-2">
            <div v-for="order in orders" class="bg-white rounded p-4 w-full">
                <p>Order Id: {{ order.id }} First name: {{ order.first_name }} Last name: {{ order.last_name }} Comment: {{ order.comment }} Status: {{ order.status }}</p>
                <div>
                    <p>Order details</p>
                    <p>Order products</p>

                </div>
                
            </div>
        </div>
    </div>
</template>