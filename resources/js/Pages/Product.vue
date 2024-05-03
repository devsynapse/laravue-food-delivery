<script setup>
import { onMounted, ref } from 'vue';

onMounted(async() => {
    getProductInfo();
})

const getProductInfo = async () => {
    let response = await axios.get('api/products/1');
    console.log(response.data);
}

</script>


<template>
    PRODUCT
</template>