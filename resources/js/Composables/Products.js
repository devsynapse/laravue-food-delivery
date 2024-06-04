import { ref } from 'vue'
 
export default function useProducts() {
    const product = ref({})
    const products = ref([])
    const popularProducts = ref([])
    
    const getProduct = async (productId) => { 
        axios.get(`/api/products/${productId}`)            
            .then(response => {
                product.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const getProducts = async () => { 
        axios.get('/api/products')            
            .then(response => {
                products.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const getPopularProducts = async () => { 
        axios.get('/api/popular-products')            
            .then(response => {
                popularProducts.value = response.data;
            })
            .catch(error => console.log(error))
    }

    return {
        products,
        product,
        popularProducts,
        getProducts,
        getProduct,
        getPopularProducts
    } 
}