<script setup>

import { ref } from 'vue'

defineProps({

});

const products = [
    {
        id: 1,
        name: 'Cheeseburger',
        href: '/products/1',
        price: '$9',
        imageSrc: 'cheese-burger.jpg',
    },
    {
        id: 2,
        name: 'Chiken burger',
        href: '#',
        price: '$8.50',
        imageSrc: 'chicken-burger.jpg',
    },
    {
        id: 3,
        name: 'Fish burger',
        href: '#',
        price: '$10',
        imageSrc: 'fish-burger.jpg',
    },
    {
        id: 4,
        name: 'Double cheeseburger',
        href: '#',
        price: '$15',
        imageSrc: 'double-burger.jpg',
    },
    // More products...
]

const cartAmount = ref(0);
const showSearchDropdown = ref(false);
const searchResults = ref([]);
const searchQuery = ref('');

const searchProducts = (e) => {
    let toAssign = [];

     if (searchQuery.value.length < 1) {
        searchResults.value = toAssign;
        showSearchDropdown.value = false;
        return false;
    }

    products.forEach(element => {
        if (element.name.toLowerCase().indexOf(searchQuery.value) > -1) {
            toAssign.push(element);
        }
    });

    searchResults.value = toAssign;    
    showSearchDropdown.value = true;
};

const getImageUrl = (image_file) => {
    let img_path = new URL(`../../images/${image_file}`, import.meta.url);

    return img_path.href;
};

</script>

<template>

    
    <div id="page-root" class="min-h-screen flex flex-col justify-between">
        <header class="border-b-2 border-grey-700">
            <nav>
                <div class="flex flex-wrap items-center justify-between p-4">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img :src="getImageUrl('app-logo.jpg')"
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

        <main class="min-h-96 flex-grow">
            <div id="main-page-intro-wrapper" class="items-center py-8 border-b-2 bg-amber-200">
                <p class="text-center">This app made for learing purpose using Laravel and Vue.js. </p>

            </div>

            <div id="popular-products-list px-14">
                <h2 class="text-center py-6 text-3xl font-extrabold">Popular products</h2>
                <div class="grid grid-cols-4 gap-x-6 gap-y-10 px-48 ">
                    <a v-for="product in products" :key="product.id" :href="product.href" class="group ">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 max-h-52">
                            <img :src="getImageUrl(product.imageSrc)"
                                class="h-full w-full object-center group-hover:opacity-75" />
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">{{ product.price }}</p>
                        <button type="submit"
                            class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            @click.stop.prevent="cartAmount++">
                            Quick order
                        </button>
                    </a>
                </div>
            </div>
        </main>

        
    </div>


</template>
