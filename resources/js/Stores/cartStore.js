import { defineStore } from 'pinia'
import { useLocalStorage } from '@vueuse/core'

export const useCartStore = defineStore('cart', {
    state: () => ({
        products: useLocalStorage('cart', {}), // product_id: quantity map
    }),

    getters: {
        // Total number of items in cart
        count(state) {
            return Object.values(state.products).reduce((a, b) => a + b, 0)
        },
    },
    actions: {
        addToCart(product_id) {
            if (this.products[product_id]) {
                this.products[product_id]++
                return this.products[product_id]
            }
            
            this.products[product_id] = 1
            return 1
        },
        reduceInCart(product_id) {
            if (this.products[product_id] && this.products[product_id] > 1) {
                this.products[product_id]--
                return this.products[product_id]
            }

            // Remove product if quantity is 1 or less
            delete this.products[product_id]
            return 0
        },

        removeProductFromCart(product_id) {
            delete this.products[product_id]
            return 0
        },
        clearCart() {
            this.products = {}
        }
    },
})