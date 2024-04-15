<template>
    <div>
      <div class="content">
        <div v-if="loading">Loading...</div>
      </div>
    </div>
  </template>
  

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import ProductCarousel from './Components/ProductCarousel.vue';

const loading = ref(true);
const products = ref([]);

// onMounted(async () => {
//     try {
//         const response = await axios.get('/wp-json/proshots/v1/get-products');
//         products.value = response.data;
//         loading.value = false;
//     } catch (error) {
//         console.error('Error fetching products:', error);
//         loading.value = false;
//     }
// });
</script>