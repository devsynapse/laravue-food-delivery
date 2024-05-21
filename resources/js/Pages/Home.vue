<script setup>
import { ref, onMounted } from 'vue'
import ProductItem from '../Components/ProductItem.vue'
import AppBanner from '../Components/AppBanner.vue'

const popularProducts = ref([])

onMounted(async() => {
    fetchPopularProducts();
})

const fetchPopularProducts = async () => {
    await axios.get('/api/popular-products')
        .then(response => popularProducts.value = response.data)
        .catch(error => console.log(error))
}
</script>

<template>
    <main class="min-h-96 flex-grow">
        <AppBanner />
        <div id="popular-products-list" class="px-14">
                <h2 class="text-center py-6 text-3xl font-extrabold">Popular products</h2>
                <div class="grid grid-cols-4 gap-x-6 gap-y-10 px-48 ">
                    <ProductItem v-for="product in popularProducts"
                        :id="product.id"
                        :name="product.name"
                        :img_url="product.img_url"
                        :price="product.price"
                    />
                </div>
            </div>
    </main>
</template>
