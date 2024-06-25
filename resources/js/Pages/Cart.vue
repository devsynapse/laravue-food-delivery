<script setup>
import { onMounted, ref,  computed} from 'vue'
import { getImageUrl } from '@/Helpers/Utilities'
import { useCartStore } from '@/Stores/cartStore'

const cartStore = useCartStore()

const cartProducts = ref([])
const cartProductsPrice = ref(0)

onMounted(async() => {
    getCartProducts()
})

const cartAddProduct = (product_id) => {
    const qty = cartStore.addToCart(product_id)   
    cartUpdateProduct(product_id, qty)
}

const cartReduceProduct = (product_id) => {
    const qty = cartStore.reduceInCart(product_id)
    cartUpdateProduct(product_id, qty)
}

const cartRemoveProduct = (product_id) => {
    const qty = cartStore.removeProducFromCart(product_id)
    cartUpdateProduct(product_id, qty)
}

const cartUpdateProduct = (product_id, qty) => {
    const prodIndex = cartProducts.value.findIndex(prod => prod.id === product_id);
      
    if (qty < 1) {
        newProducts = cartProducts.value.splice(prodIndex, 1)
        cartProducts.value = newProducts
        updateCartTotal()
        return
    }

    cartProducts.value[prodIndex]['qty'] = qty
    updateCartTotal()
    return
}

const getCartProducts = async () => {
    const productIds = Object.keys(cartStore.products)

    await axios.get('/api/cart', 
        {
            params: {
                products: productIds
            }
        })        
        .then((response) => {
            response.data.forEach(element => {
                const product = {
                    'id': element.id,
                    'name': element.name,
                    'qty' : cartStore.products[element.id] ?? 0,
                    'img_url': element.img_url,
                    'price': element.price,
                }

                cartProducts.value.push(product)
            })          
        })
        .then(() => {
            updateCartTotal()
        })
        .catch(error => console.log(error))
}

const updateCartTotal = () => {
    cartProductsPrice.value = cartProducts.value.reduce((acc, prod) => {
        return acc + (prod.qty * prod.price)
    },0)
}

const form = ref({
    first_name: 'test',
    last_name: 'test',
    address: 'test',
    unit: 'test',
    comment: 'test',
    products: cartProducts,
})

const submit = () => {
    axios.post('/api/order', form.value)
        .then((response) => {
            //console.log(response.data)
  
        })
        .catch(error => console.log(error))
}

</script>

<template>
    <div id="my-order">
        <h2 class="text-center py-6 text-3xl font-extrabold">My order</h2>
        <form @submit.prevent="submit">
            <div id="order-info" class="flex flex-col xl:flex-row gap-6">          
                
                <div id="order-items" class="bg-white rounded p-4 w-full xl:w-1/2">

                    <div v-for="product in cartProducts" class="order-item flex items-center border-b border-[#2222221a] pb-[15px] mb-[15px]">
                        <div class="overflow-hidden rounded relative w-3/12">
                            <img :src="getImageUrl(product.img_url)" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-[15px] w-3/12">
                            <div class="mb-[10px] flex flex-col items-start">
                                <p class="font-bold">{{ product.name }}</p>
                                <div>
                                    <p>Add-ons: <span>Tomato, chesee, pickles</span></p>
                                </div>
                                <div class="flex justify-start font-bold mt-2 text-lg">price: ${{ product.price }}</div>
                            </div>
                            
                        </div>
                        <div class="ml-[15px] flex flex-col justify-end w-6/12">
                            
                            <div class="flex flex-row justify-end">
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button @click="cartReduceProduct(product.id)" type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5" :value="product.qty" />
                                    <button @click="cartAddProduct(product.id)" type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                                <button @click="cartRemoveProduct(product.id)" class="xl:ms-8 ms-2 p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div id="order-info" class="w-full xl:w-1/2">
                    <div class="flex flex-wrap flex-col rounded bg-white mb-6 p-4">
                        <p class="font-bold">Products: ${{ cartProductsPrice }}</p>
                        <p class="font-bold">Delivery: $0</p>
                        <p class="font-bold">Total: $100</p>
                    </div>
                    <div class="flex flex-col mb-6 bg-white p-4">
                        <div class="flex flex-wrap mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    First Name
                                </label>
                                <input v-model="form.first_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="First Name">
                                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Last Name
                                </label>
                                <input v-model="form.last_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <div class="w-full md:w-3/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-street">
                                    Street address
                                </label>
                                <input v-model="form.address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-street" type="text" placeholder="Street address">
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-unit">
                                    Unit #
                                </label>
                                <input v-model="form.unit" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-unit" type="text" placeholder="Unit">
                            </div>
                        </div>
                        <div class="flex flex-wrap flex-wrap mb-6">
                            <div class="flex w-full flex-col px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-comment">
                                    Comment to order
                                </label>
                                <textarea v-model="form.comment" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add comment for to your order...">

                                </textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <div class="flex w-full xl:w-1/2 px-3 justify-center">
                                <button type="submit" class="w-full justify-center text-center inline-flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                    </svg>
                                    <span class="mx-2">Place order</span>
                                </button>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
        </form> 
    </div>
</template>