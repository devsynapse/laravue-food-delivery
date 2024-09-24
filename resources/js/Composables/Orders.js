import { ref } from 'vue'
 
export default function useOrders() {
    const order = ref({})
    const orders = ref([])
    
    const getOrder = async (orderId) => { 
        axios.get(`/api/orders/${orderId}`)            
            .then(response => {
                order.value = response.data.data;
            })
            .catch(error => console.log(error))
    }

    const getOrders = async () => { 
        axios.get('/api/orders')            
            .then(response => {
                orders.value = response.data.data;
            })
            .catch(error => console.log(error))
    }

    return {
        order,
        orders,
        getOrder,
        getOrders,
    } 
}