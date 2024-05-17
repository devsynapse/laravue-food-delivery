<script setup>

import { ref } from 'vue'

const showSearchDropdown = ref(false)
const searchQuery = ref('')
const searchResults = []
    
const searchProducts = (e) => {
     if (searchQuery.value.length > 0) {
            axios.get('/api/find-products/'+searchQuery.value)
            .then((response) => {
                searchResults.value = response.data
                showSearchDropdown.value = true
                console.log(searchResults.length)
            })
            .catch((error) => {
                showSearchDropdown.value = false   
            })  
    } else {
        showSearchDropdown.value = false
    }
};

</script>

<template>    
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
</template>

<script>
  export default {
    name: 'SearchBar'
  }
</script>