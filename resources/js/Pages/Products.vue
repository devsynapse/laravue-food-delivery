<script setup>
import { onMounted, ref } from 'vue'
import ProductItem from '../Components/ProductItem.vue'
import useProducts from '../Composables/Products'

const { products, getProducts } = useProducts()

onMounted(() => {
    getProducts()
})

</script>

<template>
    <div id="products-list">
        <h2 class="text-center py-6 text-3xl font-extrabold">Our menu</h2>               
        <div class="grid grid-row xl:grid-cols-4 gap-x-6 gap-y-10">
            <ProductItem v-for="product in products"
                :id="product.id"
                :name="product.name"
                :img_url="product.img_url"
                :price="product.price"
            />
        </div>
    </div>
</template>