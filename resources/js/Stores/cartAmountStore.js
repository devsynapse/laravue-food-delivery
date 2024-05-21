import { defineStore } from 'pinia'

export const useCartAmountStore = defineStore('cartAmount', {
    state: () => {
        return { count: 0 }
    },
    
    actions: {
        addToOrder() {
          this.count++
        },
    },
})