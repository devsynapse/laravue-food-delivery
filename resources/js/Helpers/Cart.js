export const addToCart = async (product_id) => {
    await axios.post('/api/cart/add', {'product_id' : product_id})
        .then((response) => {
            console.log(response.data)
        })
        .catch(error => console.log(error))
}

export const removeFromCart = (product_id) => {
    
}