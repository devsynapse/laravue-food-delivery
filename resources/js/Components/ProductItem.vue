<script setup>

import { getImageUrl } from '../Helpers/Utilities'
import { useCartAmountStore } from '../Stores/cartAmountStore'
import { addToCart } from '../Helpers/Cart'

const cartAmount = useCartAmountStore()

defineProps([
    'id',
    'name',
    'description',
    'href',
    'img_url',
    'price',

])
</script>

<template>
  <div class="rounded bg-white p-3  transition-all duration-200 hover:-translate-y-0.5 hover:shadow-downfall-lg shadow-sm">
      <a :key="id" :href="'/products/'+id" class="group">
          <div
              class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 max-h-52">
              <img :src="getImageUrl(img_url)"
                  class="h-full w-full object-center group-hover:opacity-75" />
          </div>
          <h3 class="mt-1 text-lg font-medium text-gray-900">{{ name }}</h3>
          <p class="text-sg font-small text-gray-700">{{ description }}</p>
          <div class="flex flex-row justify-between mt-4">
            <p class="mt-1 text-lg font-medium text-gray-900">${{ price }}</p>  
            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                @click.stop.prevent="addToCart(id)">
                Add to cart
            </button>
        </div>
      </a>  
  </div>    
</template>

<script>
  export default {
    name: 'ProductItem'
  }
</script>