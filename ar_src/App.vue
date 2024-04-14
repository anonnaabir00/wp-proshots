<template>
    <div>
        <div class="content">
            <div v-if="loading">Loading...</div>
            <div v-else class="grid grid-cols-2 gap-4">
                <div v-for="product in products" :key="product.id" class="product-item">
                    <h2>{{ product.name }}</h2>
                    <img :src="product.image" :alt="product.name">
                    <p>{{ product.description }}</p>
                    <a :href="product.permalink">View Product</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const loading = ref(true);
const products = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/wp-json/proshots/v1/get-products');
        products.value = response.data;
        loading.value = false;
    } catch (error) {
        console.error('Error fetching products:', error);
        loading.value = false;
    }
});
</script>
