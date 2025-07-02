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

    <div v-if="orders.length" id="orders-list" class="flex flex-col gap-4">
      <div
        v-for="order in orders"
        :key="order.id"
        class="bg-white rounded shadow-md p-4 w-full"
      >
        <p class="font-bold text-lg mb-2">
          Order #{{ order.id }} — {{ order.first_name }} {{ order.last_name }}
        </p>
        <p class="text-gray-700 mb-2">Comment: {{ order.comment }}</p>
        <p class="text-sm text-blue-600 mb-2">Status: {{ order.status }}</p>

        <div v-if="order.products && order.products.length">
          <p class="font-semibold">Products:</p>
          <ul class="list-disc pl-6 text-sm">
            <li v-for="product in order.products" :key="product.id">
              {{ product.name }} — {{ product.pivot.qty }} x ${{ product.pivot.price }} = ${{ product.pivot.total }}
            </li>
          </ul>
        </div>
        <div v-else class="text-sm text-gray-500">No products in this order.</div>
      </div>
    </div>

    <div v-else class="text-center text-gray-500 mt-10">
      No orders found.
    </div>
  </div>
</template>