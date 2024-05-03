<script setup>
import { ref } from 'vue'

defineProps({

});

const cartAmount = ref(0);

const getImageUrl = (image_file) => {
    let img_path = new URL(`../../images/${image_file}`, import.meta.url);

    return img_path.href;
};

const addToOrder = () => {
    cartAmount += 1;
}

</script>

<template>
    <header class="border-b-2 border-grey-700">
        <nav>
            <div class="flex flex-wrap items-center justify-between p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img :src="getImageUrl('site-logo.jpg')"
                        class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">
                        LaraVue Food</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        Checkout
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            {{ cartAmount }}
                        </span>
                    </button>

                </div>
                <div id="search-form" class="w-full max-w-2xl mx-auto">
                    <form>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input v-on:keyup="searchProducts" v-model="searchQuery" type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search products" required />
                                
                        </div>
                        <div v-if="showSearchDropdown" id="dropdown" class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full max-w-2xl absolute">
                            <ul v-if="searchResults.length > 0" class="py-2 text-sm text-gray-700">
                                <li v-for="searchResult in searchResults">
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">{{ searchResult.name }}</button>
                                </li>    
                            </ul>
                            <p v-else class="p-4">Nothing found</p>
                        </div>
                    </form>
                </div>    
            </div>
        </nav>
    </header>
</template>

<script>
  export default {
    name: 'AppHeader'
  }
</script>