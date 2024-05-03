<script setup>
import { onMounted, ref } from 'vue';

let products = ref([]);

onMounted(async() => {
    getProductInfo();
})

const getProductInfo = async () => {
    let response = await axios.get('api/products/1');
    products.value = response.data;
}

</script>

<template>
    <div id="page-root" class="min-h-screen flex flex-col justify-between">
        <div id="popular-products-list px-14">
            
            <div class="grid grid-cols-4 gap-x-6 gap-y-10 px-48">
                <div v-for="product in products" :key="product.id" class="group">
                    <h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>              
                </div>
            </div>
            
        </div>
    </div>
</template>