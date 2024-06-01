import { defineStore } from 'pinia'
import { useLocalStorage } from '@vueuse/core'

export const useCartStore = defineStore('cart', {
    state: () => ({
        products: useLocalStorage('cart', {}),
    }),

    getters: {
        count(state) {
            return Object.values(state.products).reduce((a, b) => a + b, 0)
        },
    },
    actions: {
        addToCart(product_id) {
            if (this.products[product_id]) {
                this.products[product_id]++
                return
            }
            
            this.products[product_id] = 1   
        },
        removeFromCart(product_id) {
            if (this.products[product_id] && this.products[product_id] > 1) {
                this.products[product_id]--
                return
            }

            delete this.products[product_id]
        },
    },
})