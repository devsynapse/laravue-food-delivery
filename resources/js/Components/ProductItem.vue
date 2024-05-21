<script setup>

import { getImageUrl } from '../Helpers/Utilities'
import { useCartAmountStore } from '../Stores/cartAmountStore'

const cartAmount = useCartAmountStore()

defineProps([
    'id',
    'name',
    'href',
    'img_url',
    'price',

])
</script>

<template>
    <a :key="id" :href="'/products/'+id" class="group">
        <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 max-h-52">
            <img :src="getImageUrl(img_url)"
                class="h-full w-full object-center group-hover:opacity-75" />
        </div>
        <h3 class="mt-4 text-sm text-gray-700">{{ name }}</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">{{ price }}</p>
        <button type="submit"
            class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            @click.stop.prevent="cartAmount.addToOrder()">
            Add to order
        </button>
        </a>
</template>

<script>
  export default {
    name: 'ProductItem'
  }
</script>