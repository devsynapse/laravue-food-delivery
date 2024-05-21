<script setup>
import { onMounted, ref } from 'vue';
import AppBanner from '../Components/AppBanner.vue'
import { useRoute } from 'vue-router';
import { useCartAmountStore } from '../Stores/cartAmountStore'
import { getImageUrl } from '../Helpers/Utilities'

const cartAmount = useCartAmountStore()
const route = useRoute();
const productId = route.params.id
const productInfo = ref({})


onMounted(async() => {
    getProductInfo()
})

const getProductInfo = async () => {
    await axios.get(`/api/products/${productId}`)
        .then((response) => {
            productInfo.value = response.data
            console.log(response.data)
            console.log(productInfo)
        })
        .catch(error => console.log(error))
}

</script>

<template>
    <div class="flex flex-col">
        <AppBanner />

        <div class="flex-col md:flex-row justify-center flex gap-4 items-start mx-4 py-12">
            <div class="flex bg-white rounded-lg shadow dark:bg-gray-800 flex-col md:flex-row">
                <div class="relative w-full md:w-48 flex justify-center items-center">
                    <img :src="getImageUrl(productInfo.img_url)" alt="shopping image"
                        class="object-cover w-full h-48 md:h-full rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                </div>
                <form class="flex-auto p-6">
                    <div class="flex flex-wrap">
                        <h1 class="flex-auto text-xl font-semibold dark:text-gray-50">{{ productInfo.name }}</h1>
                        <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">{{productInfo.price}}$</div>
                    </div>
                
                    <div class="flex mb-4 text-sm font-medium">
                        <button type="button"
                            class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg "
                            @click="cartAmount.addToOrder()">
                            Add to order
                        </button>
                    </div>
                </form>
            </div>
        </div>   
    </div>    
</template>