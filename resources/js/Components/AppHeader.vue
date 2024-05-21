<script setup>
import { ref } from 'vue'
import CartButton from './CartButton.vue'
import SearchBar from './SearchBar.vue'
import AppLogo from '../../images/app-logo.jpg'

</script>

<template>
    <header class="border-b-2 border-grey-700">
        <nav>
            <div class="flex flex-wrap items-center justify-between p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img :src="AppLogo" class="h-8" alt="App Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">LaraVue Food</span>
                </a>
                <a href="/products" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3">Menu</a>
                <CartButton />
                <SearchBar />
            </div>
        </nav>
    </header>
</template>

<script>
  export default {
    name: 'AppHeader'
  }
</script>