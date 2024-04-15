<template>
    <div>
      <div class="bg-white drop-shadow-lg m-16 p-16">
        <h1 class="text-3xl font-bold">Product Showcase For WooCommerce</h1>
        <p class="text-gray-600 mt-4">Version: 1.5</p>
        <p class="text-base mt-4 mb-8">By using this shortcodes, you can easily integrate the product showcase in your WooCommerce Store.</p>
        <div class="grid grid-cols-2 gap-12 mt-8 mb-8 w-full">
            <Card class="bg-purple-700 text-white">
            <template #title>Product Grid / Card</template>
            <template #content>
                <p class="m-0">To Use Product Grid shortcode, just copy paste the code.</p>
                <p class="mt-4 mb-2 font-bold text-sm">Default</p>
                <Message severity="contrast" :closable="false">[proshots_product_grid]</Message>
                <p class="mt-4 mb-2 font-bold text-sm">With Product Count</p>
                <Message severity="contrast" :closable="false">[proshots_product_grid products=4]</Message>
            </template>
        </Card>

        <Card class="bg-purple-700 text-white">
            <template #title>Product Carousel</template>
            <template #content>
                <p class="m-0">To Use Product Carousel, just copy paste the shortcode.</p>
                <p class="mt-4 mb-2 font-bold text-sm">Default</p>
                <Message severity="contrast" :closable="false">[proshots_product_carousel]</Message>
                <p class="mt-4 mb-2 font-bold text-sm">With Product Count</p>
                <Message severity="contrast" :closable="false">[proshots_product_carousel products=4]</Message>
                <p class="mt-4 mb-2 font-bold text-sm">With Product Grid Amount</p>
                <Message severity="contrast" :closable="false">[proshots_product_carousel product_grid=4]</Message>
            </template>
        </Card>

        </div>
      </div>
    </div>
  </template>
  
<script setup>
import Card from 'primevue/card';
import Message from 'primevue/message';
</script>