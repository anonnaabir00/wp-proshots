// Library
import { createApp } from 'vue';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Components
// import App from './App.vue'

// const app = createApp(App);
// app.mount('#proshost-products');


const swiperElement = document.querySelector('.swiper');
const productGrid = swiperElement.dataset.productgrid;

const swiper = new Swiper('.swiper', {
    slidesPerView: Number(productGrid),
    spaceBetween: 20,
    autoplay: {
        delay: 3000,
    },
    direction: 'horizontal',
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

