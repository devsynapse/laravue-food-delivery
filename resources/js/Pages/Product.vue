<script setup>
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';
import { getImageUrl } from '../Helpers/Utilities'
import { addToCart } from '../Helpers/Cart'

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
        })
        .catch(error => console.log(error))
}

</script>

<template>
    <div id="products-page">
        <div class="flex xl:flex-row flex-col rounded bg-white p-4">
            <div id="product-image" class="lg:w-4/12 md:w-5/12 w-full px-[15px]">
                <div class="detail-media rounded-[10px] overflow-hidden w-full mb-[30px]">
                    <img :src="getImageUrl(productInfo.img_url)" class="h-full w-full object-cover">
                </div>
            </div>    
            <div id="product-info" class="lg:w-8/12 md:w-7/12 w-full px-[15px]">
                <div class="relative">
                    <form>
                        <div class="flex flex-col flex-wrap mb-4">
                            <h1 class="mb-2 lg:text-4xl sm:text-[2rem] text-[1.75rem] font-semibold">{{ productInfo.name }}</h1>
                            <p class="text-[15px] mt-5 mb-4">{{ productInfo.description }}</p>   
                        </div>
                        <div class="flex flex-col flex-wrap mb-4">
                            <p>Add-ons</p>
                            <div class="flex items-center mb-2">
                                <input id="default-checkbox" type="checkbox" name="addons[]" value="cheese" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Additional cheese (+1$)</label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="default-checkbox" type="checkbox" name="addons[]" value="tomato" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Additional tomato (+0.50$)</label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="default-checkbox" type="checkbox" name="addons[]" value="pickle" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Additional pickle (+0.25$)</label>
                            </div>
                        </div>
                        
                        <div class="flex flex-col xl:flex-row mb-4 text-sm font-medium gap-8">
                            <div class="flex flex-col">
                                <p>Price</p>
                                <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">{{ productInfo.price }}$</div>
                            </div> 
                            <button type="button"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                @click="addToCart(productInfo.id)">
                                Add to cart
                            </button>
                        </div>
                    </form>
                </div>        
            </div>
        </div>
        
    </div>
</template>