<script setup>
import { onMounted } from 'vue'
import ProductItem from '@/Components/ProductItem.vue'
import useProducts from '@/Composables/Products'

const { popularProducts, getPopularProducts } = useProducts()

onMounted(() => {
    getPopularProducts()
})

</script>

<template>
    <div id="popular-products-list">
        <h2 class="text-center py-6 text-3xl font-extrabold">Popular products</h2>
        <div class="grid grid-row xl:grid-cols-4 gap-x-6 gap-y-10">
            <ProductItem v-for="product in popularProducts"
                :id="product.id"
                :name="product.name"
                :img_url="product.img_url"
                :price="product.price"
            />
        </div>
    </div>
</template>
